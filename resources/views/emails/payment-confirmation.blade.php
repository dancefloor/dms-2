@component('mail::message')

# Payment received successfully

### Your registration status is now {{ $status }}

Congratulations, we have successfully received your payment and you are
now {{ $status == 'paid' ? $status :'partially registered'}} for
your selected courses. Please check your courses on your Dashboard to know any extra information you may need

@component('mail::button', ['url' => route('dashboard')])
Visit my dashboard
@endcomponent

@endcomponent