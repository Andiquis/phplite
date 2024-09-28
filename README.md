# Aplicación Web PHP Lite

## Descripción

Esta es una aplicación web diseñada específicamente para ejecutarse en navegadores móviles o en Termux. Es una solución ligera y eficiente para gestionar tu base de datos SQLite de manera fácil y accesible.

## Requisitos

Asegúrate de tener Termux instalado en tu dispositivo Android.

## Instalación y Ejecución

Sigue los siguientes pasos para configurar la aplicación:

1. Actualiza los paquetes de Termux:
pkg update && pkg upgrade
2. Instala PHP y SQLite:
pkg install php sqlite
3. Clona el repositorio:
git clone https://github.com/Andiquis/phplite
4. Navega al directorio de la aplicación:
cd phplite
5. Inicia el servidor PHP:
php -S localhost:8000

## Acceso a la Aplicación

Una vez que el servidor esté en ejecución, abre tu navegador móvil y accede a:
http://localhost:8000


¡Ahora puedes disfrutar de tu aplicación web en tu teléfono!

### Notas

- Asegúrate de tener una conexión de red adecuada para acceder a la aplicación.
- Para detener el servidor, puedes usar Ctrl + C en la terminal donde lo ejecutaste.
