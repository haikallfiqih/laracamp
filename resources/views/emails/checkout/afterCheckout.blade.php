<x-mail::message>
# Aww, You have register on {{ $checkout->Camp->title }}

Hello {{ $checkout->User->name }},
<br>

Thank you for register on <b>{{ $checkout->Camp->title }}</b>, You can see the details in your dashboard

<x-mail::button :url="route('dashboard', $checkout->id)">
Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
