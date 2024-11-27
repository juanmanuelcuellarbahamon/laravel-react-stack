# laravel-react-stack

git clone https://github.com/juanmanuelcuellarbahamon/laravel-react-stack

Frontend Project Setup

Este proyecto está configurado para el desarrollo de una aplicación frontend moderna utilizando tecnologías como React, TypeScript, Vite, ESLint, y Prettier. A continuación, se detallan los pasos necesarios para instalar y ejecutar el proyecto.

Requisitos previos
Antes de comenzar, asegúrate de tener instalados los siguientes programas:

Node.js (versión 16 o superior)
npm o yarn

Pasos de instalación
Clonar el repositorio

Accede al frontend

cd frontend

Instalar dependencias
Instala las dependencias necesarias ejecutando el siguiente comando:

npm install

Desarrollo

npm run dev
npm run build
npm run lint
npm run format

Pruebas

npm run test
npm run test:clear
npm run test:watch
npm run test:coverage

Dependencias de desarrollo

Vite: Herramienta rápida de desarrollo y construcción.
TypeScript: Para añadir tipado estático al proyecto.
ESLint: Para asegurar un código limpio y consistente.
Prettier: Para formateo automático del código.
Jest: Framework para pruebas unitarias.
Testing Library: Para pruebas enfocadas en la interacción del usuario.

Laravel Backend Project Setup

Este proyecto utiliza Laravel como framework principal para la construcción de aplicaciones web y API. A continuación, se detallan los pasos necesarios para instalar y ejecutar este backend.

Requisitos previos
Antes de comenzar, asegúrate de tener instalados los siguientes programas:

PHP (versión 8.2 o superior)
Composer
MySQL o cualquier otro gestor de bases de datos compatible con Laravel
Node.js y npm (opcional, para recursos front-end)

composer install

Generar la clave de aplicación

Ejecuta el siguiente comando para generar una clave única para la aplicación:

php artisan key:generate
php artisan migrate
php artisan serve

Dependencias de desarrollo

PHPUnit: Para pruebas unitarias.
PHPStan & Larastan: Para análisis estático del código.
Laravel Pint: Para formateo del código según estándares de Laravel.
FakerPHP: Para generar datos ficticios.
Mockery: Para simulación en pruebas.