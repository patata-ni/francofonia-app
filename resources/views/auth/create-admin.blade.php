{{--
| Vista: auth/create-admin.blade.php
| Formulario para crear un usuario admin desde el login
--}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Admin — Francofonía</title>
    <link href="{{ asset('css/fonts-local.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <style>
        body { background: #f5f5f5; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .admin-card { background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); width: 100%; max-width: 420px; padding: 30px; }
        .form-label { font-weight: 600; color: #333; }
        .btn-admin { background: #002395; color: white; border: none; padding: 14px; font-size: 1.1rem; font-weight: 700; border-radius: 10px; width: 100%; cursor: pointer; }
        .btn-admin:hover { background: #0035b5; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; font-size: 0.9rem; }
        .back-link:hover { color: #002395; }
    </style>
</head>
<body>
    <div class="admin-card">
        <h2 class="mb-4">Crear usuario administrador</h2>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('admin.create.post') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn-admin">Crear Admin</button>
        </form>
        <a href="{{ route('login') }}" class="back-link"><i class="bi bi-arrow-left"></i> Volver al login</a>
    </div>
</body>
</html>
