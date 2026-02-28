<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Participante #{{ $participant->id }}</title>
</head>
<body>
<h1>Participante</h1>
<p><strong>Nombre:</strong> {{ $participant->nombre }} {{ $participant->paterno }} {{ $participant->materno }}</p>
<p><strong>Correo:</strong> {{ $participant->correo }}</p>
@if($participant->qr_code)
    <div>
        <p>Código QR:</p>
        <div>{!! QrCode::size(200)->generate($participant->qr_code) !!}</div>
        <p><small>{{ $participant->qr_code }}</small></p>
    </div>
@endif
<a href="{{ route('participants.index') }}">Volver</a>
</body>
</html>