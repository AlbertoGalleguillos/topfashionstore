@component('mail::message')
{{-- Greeting --}}
# Hola !

{{-- Intro Lines --}}
User ha ingresado un nuevo requerimiento

{{-- Action Button --}}
@component('mail::button', ['url' => '/tickets', 'color' => 'blue'])
Ver Requerimiento
@endcomponent

{{-- Outro Lines --}}
Recuerda que tienes , X horas para ponerte en contacto con el usuario.

{{-- Salutation --}}
Saludos,<br>{{ config('app.name') }}

{{-- Subcopy --}}
@component('mail::subcopy')
Si tienes problemas haciendo click en el botón "Ver Requerimiento", copia y pega en tu navegador la 
siguiente URL: [{{ 'tickets' }}]({{ '$tickets' }})
@endcomponent
@endcomponent