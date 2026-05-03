<x-mail::message>
# ⏳ Tu pedido está pendiente de confirmación

Hola **{{ $order->user->name }}**,

Gracias por escoger **Estanquillo Fry** 💛
Tu pedido lleg\u00f3 en buenas manos. Apenas confirmemos todo, nos ponemos a preparar tu orden para que llegue calentita.

Esto significa que estamos validando tu pago y confirmando que tengamos todo disponible.
No se preocupe, en breve le avisamos cuando est\u00e9 listo y en camino.

---

## 🧾 Su pedido

**Estado actual:** ⏳ Pendiente
**Forma de pago:** {{ ucfirst($order->payment_method) }}
**Fecha:** {{ $order->created_at->format('d M Y \a \l\a\s H:i') }}

<x-mail::table>
| Producto | Cantidad | Precio |
| :------- |:--------:| ------: |
@foreach($order->items as $item)
| {{ $item->product_name }} | {{ $item->quantity }} | ${{ number_format($item->price * $item->quantity, 0, ',', '.') }} |
@endforeach
| **TOTAL** |  | **${{ number_format($order->total, 0, ',', '.') }}** |
</x-mail::table>

---

## 🚚 Direcci\u00f3n para la entrega

📍 **{{ $order->address }}**
🏙️ **{{ $order->city }}**
📞 **{{ $order->phone }}**

Si alguno de estos datos no est\u00e1 bien, n\u00f3s avisa ya para no tener problemas con la entrega.

---

## ℹ️ ¿Qué sigue ahora?

Mientras tu pedido esté en estado **pendiente**, nuestro equipo está:

✅ Verificando el pago
✅ Validando disponibilidad del producto
✅ Confirmando datos de entrega

Una vez todo esté aprobado, recibirás un correo confirmando que tu pedido ha sido procesado y preparado para envío.

---

## 🥂 Gracias por confiar en Estanquillo Fry

Usted es parte importante de nuestro equipo.
Nos esforzamos para que cada compra sea tan buena como su trago favorito 🍷

Si tiene alguna pregunta o necesita ayuda, aquí estamos.

<x-mail::button :url="route('catalog')">
Ver más productos
</x-mail::button>

Con aprecio,
**El equipo de Estanquillo Fry**
✨ Donde cada pedido importa ✨

</x-mail::message>
