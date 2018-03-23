@component('mail::message')
{{-- Greeting --}}
# Hola !

{{-- Intro Lines --}}
Se le ha asignado un nuevo requerimiento

{{-- Action Button --}}
@component('mail::button', ['url' => $url, 'color' => 'blue'])
Ver Requerimiento
@endcomponent

{{-- Outro Lines --}}
{{-- Recuerda que tienes, 2 horas para ponerte en contacto con el usuario. --}}

{{-- Salutation --}}
Saludos,<br>{{ config('app.name') }}

{{-- Subcopy --}}
@component('mail::subcopy')
Si tienes problemas haciendo click en el botón "Ver Requerimiento", copia y pega en tu navegador la 
siguiente URL: [{{ $url }}]({{ $url }})
@endcomponent
@endcomponent