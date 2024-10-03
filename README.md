# Aplicación Web PHP Lite

## Descripción

Esta es una aplicación web diseñada específicamente para ejecutarse en navegadores móviles o en Termux. Es una solución ligera y eficiente para gestionar tu base de datos SQLite de manera fácil y accesible.

## Requisitos

Asegúrate de tener Termux instalado en tu dispositivo Android.

## Instalación y Ejecución

Sigue los siguientes pasos para configurar la aplicación:
 ```bash
pkg update && pkg upgrade
pkg install php sqlite
git clone https://github.com/Andiquis/phplite
cd phplite
php -S 0.0.0.0:8000
```
## Acceso a la Aplicación

Una vez que el servidor esté en ejecución, abre tu navegador móvil y accede a:
http://localhost:8000


¡Ahora puedes disfrutar de tu aplicación web en tu teléfono!

### Notas

- Asegúrate de tener una conexión de red adecuada para acceder a la aplicación.
- Para detener el servidor, puedes usar Ctrl + C en la terminal donde lo ejecutaste.


### Opcional

  -Este paso es para automatizar el encendido del servidor de manera automatica en la vamos a configurar el archivo de arranque de termux para que el servidor arranque al momento de entrar a termux
 ```bash
cd $HOME
cd ..
cd usr
cd etc
nano bash.bashrc
```
En el final del codigo de bash.bashrc adicionar las siguientes lineas de codigo
```bash
cd $HOME
cd phplite
php bash start.sh
```
  Guarda el archivo y reinicia termux.
  
  para visualizar su aplicacion web en otros dispositivos locales solo acceda al ip swlan0 de las red. el ip puede visualizar ejecutando el siguiente comando en termux
  ```bash
ifconfig
```
en el navegador 192.168.#.#:8000
