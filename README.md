## About
A technical evaluation of Netzwelt Inc. for Software Engineer role

## Laravel Version
`Laravel Framework 8.55.0`

## Server Requirements
Please check https://laravel.com/docs/8.x/deployment#server-requirements

## Installation
1. Clone repository to your local machine
2. Open terminal and `cd` to `netzwelt-technical-evaluation` folder
3. Type `cp .env.example .env` to create a new copy of env file
4. Create a database
5. Open `/.env` file and edit database configuration
6. Run `php artisan migrate` on your terminal to load migration files or run `/database/netzwelt_technical_evaluation.sql`
7. **You can skip this step if you run `netzwelt_technical_evaluation.sql`**
   1. Create a single user using User factory or manually inserting a record to `users` database table. We'll need this local user to utilise `Auth` facade.
8. Serve Laravel project

## Online Demo Link
https://netzwelt-technical-evaluation.tri-apps.com/account/login \
Username: foo \
Password: bar
