@component('mail::message')

# Payment Reminder

Hey we have noticed you have unpaid bills on our system. blabla bla please pay


@component('mail::button', ['url' => route('dashboard')])
My dashboard
@endcomponent

@endcomponent