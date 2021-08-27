@component('mail::message')

# Payment received successfully

Your registration status is: **{{ $status == 'paid' ? $status :'partially registered'}}**

Congratulations, we have successfully received your payment and you are
now registered for your selected courses. Please check your courses on your Dashboard to know any extra information you
may need

Amount received: CHF **{{ $amount }}**

@component('mail::button', ['url' => route('dashboard')])
Visit my dashboard
@endcomponent

@endcomponent