<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td>
            {{-- Usamos un DIV para dar estilo, pero imprimimos el contenido automático ($slot) --}}
            <div style="color: #718096; font-size: 12px; line-height: 1.5; text-align: center;">
                {{ Illuminate\Mail\Markdown::parse($slot) }}
            </div>
        </td>
    </tr>
</table>