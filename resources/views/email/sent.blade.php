
@component('mail::message')
# {{ __('contact.new_message_from') }} {{ $name }}

{{ $text}}

{{ config('app.name') }}
@endcomponent
