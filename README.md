<h1 align="center">CRM Agencia de Autos</h1>

<p align="center">
    <em>Un sistema de gestión de relaciones con clientes para agencias de autos</em>
</p>

## Acerca del CRM Agencia de Autos

El CRM Agencia de Autos es una aplicación web diseñada específicamente para agencias de autos, que permite gestionar las relaciones con los clientes de manera eficiente. Con este CRM, las agencias de autos pueden realizar un seguimiento de los clientes, administrar los vehículos disponibles, programar citas, realizar cotizaciones y mucho más.

## Características principales

- **Gestión de clientes**: Registra y administra los datos de tus clientes, incluyendo información de contacto, historial de compras y preferencias.

- **Inventario de vehículos**: Mantén un registro de los vehículos disponibles en tu agencia, con detalles como marca, modelo, año, kilometraje, etc.

- **Programación de citas**: Programa y administra citas con los clientes para pruebas de manejo, mantenimiento, entrega de vehículos, etc.

- **Cotizaciones y ventas**: Genera cotizaciones personalizadas para los clientes y realiza un seguimiento de las ventas realizadas.

- **Historial de comunicación**: Registra todas las interacciones con los clientes, como llamadas, correos electrónicos y reuniones.

## Requisitos del sistema

```
- PHP >= 7.4
* Laravel Framework >= 8.x
+ MySQL o cualquier otro sistema de gestión de bases de datos compatible
```

## Instalación

1. Clona este repositorio en tu máquina local:

> git clone https://github.com/Amizadayor/Agencia-autos.git

2. Navega hasta el directorio del proyecto:

> cd tu-repositorio

3. Instala las dependencias del proyecto:

> composer install

4. Crea una copia del archivo .env.example y renómbralo como .env. Luego, configura la conexión a tu base de datos en el archivo .env.

5. Ejecuta las migraciones para crear las tablas de la base de datos:

> php artisan migrate

6. Inicia el servidor de desarrollo:

> php artisan serve

7. Accede a la aplicación en tu navegador web en la siguiente URL:
http://localhost:8000
