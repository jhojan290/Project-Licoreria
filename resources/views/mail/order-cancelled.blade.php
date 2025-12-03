<x-mail::message>
# ❌ Tu pedido ha sido cancelado

Hola **{{ $order->user->name }}**,

Queremos informarte que tu pedido ha sido cancelado.

Sabemos que esto puede resultar inesperado y lo sentimos mucho. Si el cobro ya fue realizado, ten la tranquilidad de que el reembolso será procesado según nuestras políticas de devolución.

📩 **¿Necesitas ayuda?**  
Si tienes alguna duda o deseas más información sobre tu cancelación, nuestro equipo de soporte está listo para ayudarte.

<x-mail::button :url="route('catalog')">
Volver a la tienda
</x-mail::button>

Gracias por tu comprensión,  
{{ config('app.name') }}
</x-mail::message>
