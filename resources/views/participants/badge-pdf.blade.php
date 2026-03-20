<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        @page { margin: 0; }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: #fff;
        }

        .badge-card {
            width: 300px;
            border: 2px solid #002395;
            border-radius: 14px;
            overflow: hidden;
            margin: 0 auto;
        }

        /* ── Logos row: fondo azul, 3 logos centrados ── */
        .logos-bar {
            background: #002395;
            padding: 12px 10px 8px;
            text-align: center;
        }
        .logos-bar table {
            width: 100%;
            border-collapse: collapse;
        }
        .logos-bar td {
            text-align: center;
            vertical-align: middle;
        }
        .logos-bar img {
            height: 38px;
            width: auto;
        }

        /* ── Header azul con título ── */
        .badge-header {
            background: #002395;
            color: #fff;
            padding: 10px 16px;
            text-align: center;
        }
        .badge-header h1 {
            font-size: 16px;
            font-weight: 800;
            margin: 0;
            color: #fff;
        }
        .badge-header small {
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.7);
        }

        /* ── Barra bandera ── */
        table.flag-bar-table {
            width: 100%;
            border-collapse: collapse;
        }
        table.flag-bar-table td {
            height: 4px;
            width: 33.33%;
        }

        /* ── Cuerpo ── */
        .badge-body {
            padding: 16px 14px;
            text-align: center;
        }
        .participant-name {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0 0 2px;
        }
        .participant-email {
            font-size: 10px;
            color: #666;
            margin: 0 0 14px;
        }
        .qr-container {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 12px;
            display: inline-block;
        }
        .qr-code-text {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            color: #002395;
            font-weight: 700;
            margin: 8px 0 0;
        }
        .qr-hint {
            font-size: 9px;
            color: #999;
            margin: 3px 0 0;
        }

        /* ── Footer ── */
        .badge-footer {
            background: #f8f9fa;
            padding: 8px 14px;
            text-align: center;
            font-size: 9px;
            color: #999;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>

<div class="badge-card">

    {{-- Fila de logos centrados sobre fondo blanco --}}
    <div class="logos-bar">
        <table>
            <tr>
                <td><img src="data:image/png;base64,{{ $logoUtgz }}" alt="UTGZ"></td>
                <td><img src="data:image/png;base64,{{ $logoFranco }}" alt="Francofonía"></td>
                <td><img src="data:image/png;base64,{{ $logoGastro }}" alt="Gastronomía"></td>
            </tr>
        </table>
    </div>

    {{-- Header azul con título --}}
    <div class="badge-header">
        <h1>Sabores de la Francofonía</h1>
        <small>Muestra Gastronómica</small>
    </div>

    {{-- Barra tricolor --}}
    <table class="flag-bar-table">
        <tr>
            <td style="background:#002395;"></td>
            <td style="background:#ffffff;"></td>
            <td style="background:#ED2939;"></td>
        </tr>
    </table>

    {{-- Datos del participante + QR --}}
    <div class="badge-body">
        <p class="participant-name">{{ $participant->nombre }} {{ $participant->paterno }} {{ $participant->materno }}</p>
        <p class="participant-email">{{ $loginEmail }}</p>

        @if($participant->qr_code)
        <div class="qr-container">
            <img src="data:image/png;base64,{{ $qrBase64 }}" width="160" height="160">
            <p class="qr-code-text">{{ $participant->qr_code }}</p>
            <p class="qr-hint">Escanear en cada estand</p>
        </div>
        @endif
    </div>
</div>

</body>
</html>
