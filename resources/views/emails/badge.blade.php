<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body style="margin:0; padding:0; background-color:#f4f4f7; font-family: Arial, Helvetica, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f7; padding:30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.08);">

                    {{-- Header con colores de la bandera de Francia --}}
                    <tr>
                        <td style="height:6px; background: linear-gradient(to right, #002395 33%, #ffffff 33%, #ffffff 66%, #ED2939 66%);"></td>
                    </tr>
                    <tr>
                        <td style="padding:30px 40px 20px; text-align:center;">
                            <h1 style="margin:0; color:#002395; font-size:24px;">Sabores de la Francofonía</h1>
                            <p style="margin:8px 0 0; color:#888; font-size:14px;">Tu gafete digital e invitación</p>
                        </td>
                    </tr>

                    {{-- Cuerpo --}}
                    <tr>
                        <td style="padding:10px 40px 30px;">
                            <p style="color:#333; font-size:16px; line-height:1.6;">
                                Apreciable <strong>{{ $participant->nombre }}</strong>,
                            </p>
                            <p style="color:#333; font-size:15px; line-height:1.6;">
                                Los estudiantes del grupo 514 AE de la carrera de Gastronomía de la
                                <strong>Universidad Tecnológica de Gutiérrez Zamora</strong> tienen el placer de
                                invitarlo(a) a la primera muestra gastronómica
                                <strong>"Sabores de la Francofonía"</strong>, que se llevará a cabo el
                                <strong>viernes 20 de marzo a la 1:00 PM</strong> en el <strong>salón Nakú</strong> de la universidad.
                            </p>
                            <p style="color:#333; font-size:15px; line-height:1.6;">
                                Adjunto a este correo encontrará su gafete digital en formato PDF con el
                                código QR que deberá presentar en cada estand durante el evento.
                            </p>

                            {{-- Datos de acceso --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f4ff; border-radius:6px; margin:20px 0;">
                                <tr>
                                    <td style="padding:20px;">
                                        <p style="margin:0 0 10px; color:#002395; font-weight:bold; font-size:14px;">
                                            📋 Sus datos de acceso al dashboard:
                                        </p>
                                        <p style="margin:0; color:#333; font-size:14px; line-height:1.8;">
                                            <strong>Código QR:</strong> {{ $participant->qr_code }}<br>
                                            <strong>Correo:</strong> {{ $loginEmail }}<br>
                                            <strong>Contraseña:</strong> {{ $participant->qr_code }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="color:#333; font-size:15px; line-height:1.6;">
                                Puede imprimir el PDF adjunto o mostrarlo desde su celular en cada estand.
                            </p>

                            {{-- Recomendación y despedida --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#fff8e6; border-left:4px solid #f0c040; border-radius:4px; margin:20px 0;">
                                <tr>
                                    <td style="padding:15px 20px;">
                                        <p style="margin:0; color:#7a6200; font-size:14px; line-height:1.6;">
                                            <strong>Recomendación:</strong> Se sugiere ingresar al evento 15 minutos antes
                                            de la hora de inicio.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="color:#333; font-size:15px; line-height:1.6;">
                                Esperamos contar con su valiosa participación. ¡Le esperamos!
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:20px 40px; background-color:#f8f8fa; border-top:1px solid #eee; text-align:center;">
                            <p style="margin:0; color:#aaa; font-size:12px;">
                                Este correo fue enviado automáticamente. No responder a esta dirección.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
