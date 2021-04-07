## Laravel Websocket and OneSignal Push Notification Example

This project is an example how to use Websocket and OneSignal Push Notification in Laravel application. The websocket library use in this project is [laravel-websocket](https://beyondco.de/docs/laravel-websockets/getting-started/introduction) and for the OneSignal library this project use [laravel-notification-channel/onesignal](https://github.com/laravel-notification-channels/onesignal).

## How to use

1. Clone this repository with the command below

    `git clone https://github.com/wijaksanapanji/laravel-websocket-example.git`

2. `cd` into the project directory

    `cd laravel-websocket-example`

3. Copy `.env.example` to `.env`

4. Install the dependency of the project

    `composer install`

    `npm install`

5. Generate Laravel `APP_KEY` with this command

    `php artisan key:generate`

6. Fill `.env` file with your `ONESIGNAL_APP_ID` and `ONESIGNAL_REST_API_KEY`

7. if you want to change pusher enviroment variable, you need to change it in `.env` file and `resources/js/bootstrap.js`

8. migrate the database migration with

    `php artisan migrate:fresh --seed`

9. then run the laravel project

    `php artisan serve`

10. Also run the websocket server

    `php artisan websockets:serve`

11. finally you can access the website one `http://localhost:8000`

## User Account to test

1. Admin

    `email: admin@test.com`

    `password: password`

2. User 1

    `email: user1@test.com`

    `password: password`

3. User 2

    `email: user2@test.com`

    `password: password`
