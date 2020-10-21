# INTRO

Aplicacion realizada con JQuery, CakePHP y Bootstrap

## INFO 

Para poder acceder requieren el E-Mail y el Password los cual dejo adjunto aca, también. Te podés crear un usuario accediendo a la siguiente URL del sistema
[servidor][ubicacion del sistemas]/users/add y para ingresar login [servidor][ubicacion del sistemas]/users/login. 

- email: itachi@uchiha.com 
- password: 123456

También adjunto la API (json-server) de la cual se obtienen los datos de la misma, esta misma posee el nombre "db.json", cabe destacar que también adjunto la DB de MySql
la cual tiene como nombre projecttest.sql.

## EXTRA 

Por favor para evitar cualquier problema de versión o subyacente acá dejo las lineas para evitar ciertos conflictos en el sistema.

- composer install

Para iniciar la API (json-server) debe utilizar los siguiente comandos.

- npm install -g json-server

- json-server --watch db.json
