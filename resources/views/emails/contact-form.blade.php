@component('mail::message')

# Mesajul a fost trimis!<br>

<strong>Nume</strong> {{ $data['name'] }}<br>
<strong>Email</strong> {{ $data['email'] }}<br>
<strong>Mesaj</strong> {{ $data['message'] }}<br>

Va vom contacta in cel mai scurt timp posibil.<br>

Va multumim,<br>
{{ config('app.name') }}
@endcomponent
