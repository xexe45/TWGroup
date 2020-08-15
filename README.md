# Postulación Desarrollador TWGroup

### Instrucciones

```
composer install
```

```
cp .env.example .env
```

```
php artisan key:generate
```

```
php artisan migrate --seed
```

## Desafío 1
Luego de instalar el proyecto Laravel, debemos configurar lo siguiente:

### Configurar Conexion Base de Datos MySQL/MariaDB
Configurar las variables de entorno que encontraremos en el archivo .env,
<ol>
<li>DB_DATABASE (Base de datos a utilizar)</li>
<li>DB_USERNAME (Usuario de base de datos)</li>
<li>DB_PASSWORD (Clave de usuario de base de datos)</li>
</ol>

### Configurar un servidor de correos SMTP
Instalar el paquete guzzlehttp con el comando:

```
composer require guzzlehttp/guzzle
```

Configurar las variables de entorno que encontraremos en el archivo .env,
<ol>
<li>MAIL_MAILER (Protocolo a utilizar)</li>
<li>MAIL_HOST (Host a utilizar)</li>
<li>MAIL_PORT (Puerto a utilizar)</li>
<li>MAIL_USERNAME (Usuario)</li>
<li>MAIL_PASSWORD (Clave)</li>
<li>MAIL_FROM_ADDRESS (Correo de envio)</li>
</ol>

### Configurar un servidor Redis.
Instalar el paquete predis/predis con el comando:

```
composer require predis/predis
```

<ol>
<li>Encontraremos la configuración de nuestro servidor en config/database.phpredis</li>

</ol>

## Desafío 2

### Publicacion puede tener varios comentarios
```
public function comments()
    {
        return $this->hasMany(Comment::class);
    }
```

### Un comentario pertenece a una publicación
```
public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
```

## Desafío 3
Código en PublicationController/index
```
$publications = Publication::whereHas('comments', function ($query) {
            $query->where([
                ['content', 'like', '%Hola%'],
                ['status', '=', 'APROBADO']
            ]);
        })->get();
```

## Desafío 4
Ventajas del uso de migraciones en una aplicación Laravel funcionando en un servidor de producción

<ol>
<li>Inserción de datos estáticos requeridos en nuestra aplicación con facilidad.
</li>
<li>Modificación / Agregación de atributos con facilidad.
</li>
</ol>