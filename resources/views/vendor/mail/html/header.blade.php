@props(['url'])
<tr>
    <td class="header" style="padding: 25px 0; text-align: center;">
        <a href="{{ $url }}" style="display: inline-block; text-decoration: none;">
            {{-- Tabla interna para alineación --}}
            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin: 0 auto; border-collapse: collapse;">
                <tr>
                    {{-- CELDA 1: EL LOGO --}}
                    {{-- Aumentamos el padding-right a 20px para dar espacio a la línea --}}
                    <td style="vertical-align: middle; padding-right: 20px;">
                        <img 
                            src="https://i.imgur.com/lZtqX77.png"
                            alt="LicUp Logo" 
                            width="55" 
                            height="auto"
                            style="display: block; border: 0;"
                        >
                    </td>

                    {{-- CELDA 2: EL TEXTO + LÍNEA SEPARADORA --}}
                    {{-- 
                        AQUÍ ESTÁ LA MAGIA:
                        1. border-left: 2px solid #d4af37; -> Crea la línea vertical dorada.
                        2. padding-left: 20px; -> Separa el texto de la línea.
                        3. height: 45px; -> Fuerza una altura mínima para que la línea se vea alta y elegante.
                    --}}
                    <td style="vertical-align: middle; padding-left: 20px; border-left: 2px solid #d4af37; height: 30px;">
                        <img 
                            src="https://i.imgur.com/UvcF59K.png" 
                            alt="LicUp Titulo" 
                            width="55" 
                            height="auto"
                            style="display: block; border: 0;"
                        >
                    </td>
                </tr>
            </table>
        </a>
    </td>
</tr>