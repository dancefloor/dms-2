@component('mail::message')

# Order created successfully

blablabla {{ $status }}

@component('mail::button', ['url' => route('dashboard')])
Visit my dashboard
@endcomponent

@endcomponent