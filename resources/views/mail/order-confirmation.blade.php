@component('mail::message')

# Order created successfully

You are now registered to the courses you have selected. The status of you order is: {{ $status }}

@component('mail::button', ['url' => route('dashboard')])
Visit my dashboard
@endcomponent

@component('mail::button', ['url' => route('payment-methods')])
Payment methods
@endcomponent

@endcomponent