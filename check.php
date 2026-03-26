<?php
/**
 * Archivo de diagnóstico para verificar la configuración del hosting.
 * SUBIR a htdocs/ y acceder desde: http://francofonia.infinityfreeapp.com/check.php
 * BORRAR después de verificar (por seguridad).
 */

echo "<h2>Diagnóstico del Hosting</h2>";

// 1. Versión de PHP
echo "<h3>1. PHP</h3>";
echo "Versión: " . phpversion() . "<br>";

// 2. Extensiones necesarias para Laravel
echo "<h3>2. Extensiones PHP</h3>";
$required = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json', 'fileinfo'];
foreach ($required as $ext) {
    $status = extension_loaded($ext) ? '✅' : '❌ FALTA';
    echo "$ext: $status<br>";
}

// 3. Verificar archivos clave
echo "<h3>3. Archivos</h3>";
$files = [
    '.env' => __DIR__ . '/.env',
    '.htaccess (raíz)' => __DIR__ . '/.htaccess',
    'public/index.php' => __DIR__ . '/public/index.php',
    'public/.htaccess' => __DIR__ . '/public/.htaccess',
    'vendor/autoload.php' => __DIR__ . '/vendor/autoload.php',
    'bootstrap/app.php' => __DIR__ . '/bootstrap/app.php',
    'artisan' => __DIR__ . '/artisan',
];
foreach ($files as $name => $path) {
    $status = file_exists($path) ? '✅ existe' : '❌ NO EXISTE';
    echo "$name: $status<br>";
}

// 4. Verificar permisos de storage
echo "<h3>4. Permisos de storage/</h3>";
$storageDirs = [
    'storage/',
    'storage/app/',
    'storage/framework/',
    'storage/framework/cache/',
    'storage/framework/sessions/',
    'storage/framework/views/',
    'storage/logs/',
];
foreach ($storageDirs as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    if (is_dir($fullPath)) {
        $writable = is_writable($fullPath) ? '✅ escribible' : '❌ NO escribible';
        echo "$dir: $writable (permisos: " . substr(sprintf('%o', fileperms($fullPath)), -4) . ")<br>";
    } else {
        echo "$dir: ❌ NO EXISTE<br>";
    }
}

// 5. Verificar contenido del .env (sin mostrar datos sensibles)
echo "<h3>5. Variables del .env</h3>";
$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    $keys = ['APP_ENV', 'APP_DEBUG', 'APP_URL', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME'];
    foreach ($keys as $key) {
        if (preg_match("/^{$key}=(.*)$/m", $envContent, $matches)) {
            $val = trim($matches[1]);
            // Ocultar valores sensibles parcialmente
            if (in_array($key, ['DB_HOST', 'DB_DATABASE', 'DB_USERNAME'])) {
                $val = substr($val, 0, 6) . '***';
            }
            echo "$key = $val<br>";
        } else {
            echo "$key = ❌ NO DEFINIDO<br>";
        }
    }
} else {
    echo "❌ No se encontró el archivo .env<br>";
}

// 6. Intentar cargar Laravel y mostrar error real
echo "<h3>6. Test de Laravel</h3>";
try {
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    echo "✅ Laravel carga correctamente<br>";
} catch (Exception $e) {
    echo "❌ Error: " . htmlspecialchars($e->getMessage()) . "<br>";
} catch (Error $e) {
    echo "❌ Error fatal: " . htmlspecialchars($e->getMessage()) . "<br>";
}
