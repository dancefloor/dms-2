<?php

namespace Tests\Feature\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PaymentController
 */
class PaymentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $payments = Payment::factory()->count(3)->create();

        $response = $this->get(route('payment.index'));

        $response->assertOk();
        $response->assertViewIs('payment.index');
        $response->assertViewHas('payments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('payment.create'));

        $response->assertOk();
        $response->assertViewIs('payment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentController::class,
            'store',
            \App\Http\Requests\PaymentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $amount = $this->faker->word;
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $user = User::factory()->create();

        $response = $this->post(route('payment.store'), [
            'amount' => $amount,
            'status' => $status,
            'user_id' => $user->id,
        ]);

        $payments = Payment::query()
            ->where('amount', $amount)
            ->where('status', $status)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $payments);
        $payment = $payments->first();

        $response->assertRedirect(route('payment.index'));
        $response->assertSessionHas('payment.id', $payment->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $payment = Payment::factory()->create();

        $response = $this->get(route('payment.show', $payment));

        $response->assertOk();
        $response->assertViewIs('payment.show');
        $response->assertViewHas('payment');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $payment = Payment::factory()->create();

        $response = $this->get(route('payment.edit', $payment));

        $response->assertOk();
        $response->assertViewIs('payment.edit');
        $response->assertViewHas('payment');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentController::class,
            'update',
            \App\Http\Requests\PaymentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $payment = Payment::factory()->create();
        $amount = $this->faker->word;
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $user = User::factory()->create();

        $response = $this->put(route('payment.update', $payment), [
            'amount' => $amount,
            'status' => $status,
            'user_id' => $user->id,
        ]);

        $payment->refresh();

        $response->assertRedirect(route('payment.index'));
        $response->assertSessionHas('payment.id', $payment->id);

        $this->assertEquals($amount, $payment->amount);
        $this->assertEquals($status, $payment->status);
        $this->assertEquals($user->id, $payment->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $payment = Payment::factory()->create();

        $response = $this->delete(route('payment.destroy', $payment));

        $response->assertRedirect(route('payment.index'));

        $this->assertSoftDeleted($payment);
    }
}
