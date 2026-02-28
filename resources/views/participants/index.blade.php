<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Participantes</title>
</head>
<body>
<h1>Participantes</h1>
<a href="{{ route('participants.create') }}">Nuevo registro</a>
<table border="1" cellpadding="4">
    <tr><th>ID</th><th>Nombre</th><th>Correo</th><th>QR</th><th>Acciones</th></tr>
    @foreach($participants as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nombre }} {{ $p->paterno }}</td>
            <td>{{ $p->correo }}</td>
            <td>@if($p->qr_code) <img src="{{ QrCode::size(50)->generate($p->qr_code) }}" alt="QR"> @endif</td>
            <td><a href="{{ route('participants.show',$p) }}">Ver</a></td>
        </tr>
    @endforeach
</table>
{{ $participants->links() }}
</body>
</html>