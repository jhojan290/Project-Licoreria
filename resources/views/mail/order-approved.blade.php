<x-mail::message>
# ✅ ¡Pedido confirmado con éxito!

Hola **{{ $order->user->name }}**,

Nos alegra informarte que tu pago ha sido verificado correctamente y tu pedido ahora se encuentra en estado **Completado**. 🎉

🍾 **Nos estamos preparando para consentirte.**
Tu pedido está siendo alistado y saldrá rumbo a ti muy pronto.

<x-mail::button :url="route('catalog')">
Volver a la tienda
</x-mail::button>

Si tienes alguna duda o necesitas ayuda adicional, estamos aquí para ti.

Gracias por confiar en **Estanquillo Fry** ✨
Un brindis por tu compra 🥂
**{{ config('app.name') }}**
</x-mail::message>
