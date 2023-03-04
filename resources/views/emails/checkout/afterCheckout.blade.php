<x-mail::message>
# Aww, You have register on {{ $checkout->Camp->title }}

Hello {{ $checkout->User->name }},
<br>

Thank you for register on <b>{{ $checkout->Camp->title }}</b>, please see payment instruction by click the button bellow

<x-mail::button :url="route('user.checkout.invoice', $checkout->id)">
Get Invoice
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
