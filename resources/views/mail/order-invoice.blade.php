<x-mail::message>
# ⏳ Tu pedido está pendiente de confirmación

Hola **{{ $order->user->name }}**,  

Gracias por elegir **LicUp** 💛  
Queremos informarte que hemos recibido tu pedido correctamente, pero **actualmente se encuentra en estado pendiente**.

Esto significa que estamos validando tu información de pago o procesando la confirmación final de tu orden.  
No te preocupes, en breve recibirás una nueva notificación cuando tu pedido sea aprobado y pase a preparación.

---

## 🧾 Resumen de tu pedido

**Estado actual:** ⏳ Pendiente  
**Método de pago:** {{ ucfirst($order->payment_method) }}  
**Fecha de solicitud:** {{ $order->created_at->format('d M Y \a \l\a\s H:i') }}

<x-mail::table>
| Producto | Cantidad | Precio |
| :------- |:--------:| ------: |
@foreach($order->items as $item)
| {{ $item->product_name }} | {{ $item->quantity }} | ${{ number_format($item->price * $item->quantity, 0, ',', '.') }} |
@endforeach
| **TOTAL** |  | **${{ number_format($order->total, 0, ',', '.') }}** |
</x-mail::table>

---

## 🚚 Dirección de entrega registrada

📍 **{{ $order->address }}**  
🏙️ **{{ $order->city }}**  
📞 **{{ $order->phone }}**

Si alguno de estos datos no es correcto, por favor contáctanos lo antes posible para evitar retrasos en la entrega.

---

## ℹ️ ¿Qué sigue ahora?

Mientras tu pedido esté en estado **pendiente**, nuestro equipo está:

✅ Verificando el pago  
✅ Validando disponibilidad del producto  
✅ Confirmando datos de entrega  

Una vez todo esté aprobado, recibirás un correo confirmando que tu pedido ha sido procesado y preparado para envío.

---

## 🥂 Gracias por confiar en LicUp

Apreciamos que formes parte de nuestra comunidad.  
Trabajamos para que cada experiencia sea tan buena como tu bebida favorita 🍷

Si tienes alguna duda o necesitas ayuda, nuestro equipo está listo para asistirte.

<x-mail::button :url="route('catalog')">
Ver más productos
</x-mail::button>

Con aprecio,  
**El equipo de LicUp**  
✨ Donde cada pedido importa ✨

</x-mail::message>
