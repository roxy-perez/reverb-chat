# Laravel Reverb Chat

## Description

This is a simple chat application built with Laravel and Reverb.

## Commands to start application

- ``sail up -d`` - start docker containers
- ``sail artisan queue:work`` - start queue worker
- ``sail artisan migrate --seed`` - run migrations and seeders
- ``sail artisan reverb:start --debug`` - start reverb server for debugging
- ``sail bun dev`` - start vite development server

## Things to have in mind

- Add to the ``docker-compose.yml`` file the following lines to make the application work with reverb:
  - ``- '${REVERB_SERVER_PORT:-8080}:${REVERB_SERVER_PORT:-8080}'``
