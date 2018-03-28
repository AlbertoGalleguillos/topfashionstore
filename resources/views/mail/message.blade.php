@component('mail::message')
{{-- Greeting --}}
# Hola !

{{-- Intro Lines --}}
Ha recibido un nuevo mensaje de {{ $sender }}

{{-- Action Button --}}
@component('mail::button', ['url' => $url, 'color' => 'blue'])
Ver Mensaje
@endcomponent

{{-- Salutation --}}
Saludos,<br>{{ config('app.name') }}

{{-- Subcopy --}}
@component('mail::subcopy')
Si tienes problemas haciendo click en el botón "Ver Mensaje", copia y pega en tu navegador la 
siguiente URL: [{{ $url }}]({{ $url }})
@endcomponent
@endcomponent