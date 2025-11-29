<x-mail::message>
{{-- SALUDO --}}
¡Hola, {{ $name }}!

Recibiste este correo porque hiciste una solicitud de restablecimiento de contraseña para tu cuenta de **LicUp**.

{{-- BOTÓN DORADO --}}
<x-mail::button :url="$url" color="primary">
Restablecer Contraseña
</x-mail::button>

Este enlace de restablecimiento expirará en 60 minutos.

Si no solicitaste un cambio de contraseña, no es necesaria ninguna acción.

Saludos,<br>
El equipo de LicUp.

{{-- AQUÍ ESTÁ LA SOLUCIÓN: ESCRIBIMOS EL SUBCOPY MANUALMENTE --}}
<x-slot:subcopy>
<div style="text-align: center; font-size: 12px; color: #718096;">
    <p>Si tienes problemas para hacer clic en el botón "Restablecer Contraseña", copia y pega la siguiente URL en tu navegador:</p>
    <p>
        <a href="{{ $url }}" style="color: #d4af37; text-decoration: underline; word-break: break-all;">
            {{ $url }}
        </a>
    </p>
</div>
</x-slot:subcopy>

</x-mail::message>