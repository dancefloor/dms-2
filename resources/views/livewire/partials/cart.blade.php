<section id="cart">
    @if (auth()->user()->work_status == 'working')
    <div class="mb-6">
        <x-partials.reduced-price-notification />
    </div>
    @endif

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" width="45%"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" width="35%"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Period
                                </th>
                                <th scope="col" width="20%"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col" class=bg-gray-50 text-right"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse (auth()->user()->pendingCourses as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('courses.view', $item->slug) }}">
                                        <span class="hover:underline">{{ $item->name }}</span>
                                        <span class="block text-xs text-gray-600">{{ $item->level }}
                                            {{ $item->focus }}</span>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if ($item->start_date)
                                    {{ \Carbon\Carbon::parse( $item->start_date )->format('M d, y') }} -
                                    {{ \Carbon\Carbon::parse( $item->end_date )->format('M d, y') }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->full_price }}
                                </td>
                                <td class="pr-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    <button wire:click="removeCourse({{$item}})"
                                        class="text-gray-500 hover:text-red-700">
                                        @include('icons.trash')
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="3">
                                    Cart Empty
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6 md:col-span-2">
            <h2 class="text-lg font-medium text-gray-900 inline-flex items-center">Payment methods</h2>
            <div class="{{ $method == 'credit-card' ? 'bg-gray-100': 'bg-gray-150'}} rounded-lg py-2 px-3">
                <label for="method" class="inline-flex items-center">
                    <input type="radio" name="method" value="credit-card" class="text-center" wire:model="method">
                    <span class="ml-2">Credit Card</span>
                    <span class="text-sm italic text-gray-700 ml-2">(CHF 0.30 + 2.8%)</span>
                </label>
            </div>
            <div class="{{ $method == 'bank-transfer' ? 'bg-gray-100': 'bg-gray-150'}} rounded-lg py-2 px-3">
                <label for="method" class="inline-flex items-center">
                    <input type="radio" name="method" value="bank-transfer" class="text-center" wire:model="method">
                    <span class="ml-2">Bank transfer</span>
                </label>
            </div>
            <div class="{{ $method == 'revolut' ? 'bg-gray-100': 'bg-gray-150'}} rounded-lg py-2 px-3">
                <label for="method" class="inline-flex items-center">
                    <input type="radio" name="method" value="revolut" class="text-center" wire:model="method">
                    <span class="ml-2">Revolut</span>
                </label>
            </div>
            {{-- <div class="{{ $method == 'paypal' ? 'bg-gray-100': 'bg-gray-150'}} rounded-lg py-2 px-3">
            <label for="method" class="inline-flex items-center">
                <input type="radio" name="method" value="paypal" class="text-center" wire:model="method">
                <span class="ml-2">Paypal </span>
                <span class="text-sm italic text-gray-700 ml-2">(€0.10 % + 3.40% + 0.55CHF)</span>
            </label>
        </div> --}}
        {{-- <div class="{{ $method == 'cash' ? 'bg-gray-100': 'bg-gray-150' }} rounded-lg py-2 px-3">
        <label for="method" class="inline-flex items-center">
            <input type="radio" name="method" value="cash" class="text-center" wire:model="method">
            <span class="ml-2">Cash</span>
        </label>
    </div> --}}
    </div>
    <div class="col-span-6 md:col-span-4">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Subtotal
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            CHF {{ number_format($subtotal, 2, '.', "'") }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">VAT (8%)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            CHF {{ $subtotal * 0.08 }}
                    </td>
                    </tr> --}}

                    @if ($count > 1)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Discount
                            ({{ $discountText }})</td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            CHF {{ $discount }}
                        </td>
                    </tr>
                    @endif

                    @if (auth()->user()->work_status != 'working')
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Reduced price discount
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            CHF 20.-
                        </td>
                    </tr>
                    @endif


                    @if ($method == 'credit-card' || $method == 'paypal')
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $method == 'credit-card' ? 'Credit card' : 'PayPal'}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            CHF {{ $commission }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                            Total
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                            CHF {{ $total }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>

        @if ($method == 'bank-transfer')
        @include('partials.payment-method.bank-transfer')
        @endif
        @if ($method == 'revolut')
        @include('partials.payment-method.revolut')
        @endif
        {{-- @if ($method == 'paypal')
        @include('partials.payment-method.paypal')
        @endif --}}
        {{-- @if ($method == 'cash')
        @include('partials.payment-method.cash')
        @endif --}}


        @if ($method == 'credit-card')
        <div class="flex justify-end">
            <a class="df-btn-primary" href="{{ route('mollie.payment', [
                        'amount'    => $total, 
                        'name'      => auth()->user()->firstname . ' ' . auth()->user()->lastname, 
                        'email'     => auth()->user()->email,
                        'courses'   => auth()->user()->pendingCourses()->pluck('course_id')->toArray(),
                        'user'      => Auth::id(),
                        'total'     => $total,
                        'discount'  => $discount,
                        'subtotal'  => $subtotal, 
                        'title'     => $title,                                               
                        ])}}">
                @include('icons.checkout')
                <span class="ml-2">Pay by Credit Card</span>
            </a>
        </div>
        @endif

        <br>

        <form wire:submit.prevent="storeOrder">
            @csrf
            @method('POST')
            <input type="hidden" value="{{ $total }}" name="total">
            <input type="hidden" value="{{ $discount }}" name="discount">
            <input type="hidden" value="{{ $subtotal }}" name="subtotal">
            <input type="hidden" value="{{ $method }}" name="method">
            @if ($method == 'bank-transfer')
            <div class="flex justify-end">
                <button type="submit" class="df-btn-primary">
                    Pay by Bank Transfer
                </button>
            </div>
            @endif
            @if ($method == 'revolut')
            <div class="flex justify-end">
                <button type="submit" class="df-btn-primary">
                    Pay with Revolut
                </button>
            </div>
            @endif
            @if ($method == 'paypal')
            <div class="flex justify-end">
                <button type="submit" class="df-btn-primary">
                    Pay by PayPal
                </button>
            </div>
            @endif
            @if ($method == 'cash')
            <div class="flex justify-end">
                <button type="submit" class="df-btn-primary">
                    @include('icons.checkout')
                    <span class="ml-2">Pay in cash</span>
                </button>
            </div>
            @endif
        </form>
        {{-- <x-partials.payment-method-checkout /> --}}
    </div>
</section>