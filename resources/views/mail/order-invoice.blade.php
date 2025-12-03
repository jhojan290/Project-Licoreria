<x-mail::message>
# 🍾 ¡Tu compra fue un éxito!

Hola **{{ $order->user->name }}**,  

Queremos agradecerte por confiar en **LicUp** 💛  
Tu pago fue procesado correctamente y tu pedido ya está siendo preparado con todo nuestro cuidado.

---

## 🧾 Detalles de tu compra

**Método de pago:** {{ ucfirst($order->payment_method) }}  
**Fecha de compra:** {{ $order->created_at->format('d M Y \a \l\a\s H:i') }}

<x-mail::table>
| Producto | Cantidad | Precio |
| :------- |:--------:| ------: |
@foreach($order->items as $item)
| {{ $item->product_name }} | {{ $item->quantity }} | ${{ number_format($item->price * $item->quantity, 0, ',', '.') }} |
@endforeach
| **TOTAL** |  | **${{ number_format($order->total, 0, ',', '.') }}** |
</x-mail::table>

---

## 🚚 Dirección de entrega

📍 **{{ $order->address }}**  
🏙️ **{{ $order->city }}**  
📞 **{{ $order->phone }}**

---

## 🥂 Gracias por elegir LicUp

Nos inspira saber que formas parte de nuestra comunidad.  
Cada pedido es preparado con la misma dedicación con la que se crea una buena bebida: cuidando cada detalle.

Si tienes alguna duda o necesitas ayuda, estamos aquí para ti.

<x-mail::button :url="route('catalog')">
Explorar más productos
</x-mail::button>

Con gratitud,  
**El equipo de LicUp**  
✨ Donde tu mejor compra comienza ✨

</x-mail::message>
