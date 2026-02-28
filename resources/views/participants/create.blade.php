<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar participante</title>
</head>
<body>
<h1>Registrar participante</h1>
@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('participants.store') }}" method="post">
    @csrf
    <label>Nombre: <input type="text" name="nombre" value="{{ old('nombre') }}" required></label><br>
    <label>Paterno: <input type="text" name="paterno" value="{{ old('paterno') }}" required></label><br>
    <label>Materno: <input type="text" name="materno" value="{{ old('materno') }}"></label><br>
    <label>Ciudad: <input type="text" name="ciudad" value="{{ old('ciudad') }}"></label><br>
    <label>Municipio: <input type="text" name="municipio" value="{{ old('municipio') }}"></label><br>
    <label>Sexo:
        <select name="sexo">
            <option value="M" {{ old('sexo')=='M'?'selected':'' }}>Masculino</option>
            <option value="F" {{ old('sexo')=='F'?'selected':'' }}>Femenino</option>
            <option value="O" {{ old('sexo','O')=='O'?'selected':'' }}>Otro</option>
        </select>
    </label><br>
    <label>Correo: <input type="email" name="correo" value="{{ old('correo') }}" required></label><br>
    <button type="submit">Guardar</button>
</form>
</body>
</html>