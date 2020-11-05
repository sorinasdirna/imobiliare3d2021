@component('mail::message')

# Mesajul a fost trimis!<br>

<strong>Nume</strong> {{ $data['nume'] }}<br>
<strong>Email</strong> {{ $data['email'] }}<br>
<strong>Mesaj</strong> {{ $data['mesaj'] }}<br>

Va vom contacta in cel mai scurt timp posibil.<br>

Va multumim,<br>
{{ config('app.name') }}
@endcomponent
