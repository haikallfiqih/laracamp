<x-mail::message>
# Your transaction has been confirmed

Hi {{ $checkout->User->name }}
<br>

Your transaction has been confirmed, now you can enjoy the benefits of <b>{{ $checkout->Camp->title }}</b> camp.
<x-mail::button :url="route('user.dashboard')">
My Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
