# laravel-horizon-memory-leak

This repository contains a demo of the `Stopwatch` memory leak in [`laravel/horizon`](https://github.com/laravel/horizon).

The `master` branch shows that with each executed queue job, the `Stopwatch::$timers` array increases in size.
It also shows that nested jobs run with `Bus::dispatchSync($innerJob)` do not create `$timers`.

The `with-fix-for-memory-leak` branch includes the fix from
[`namoshek/horizon`](https://github.com/laravel/horizon/compare/ff534ce86fa27623d49da8a4272d3301b7998e6f...Namoshek:fix-stopwatch-memory-leak).

## How to run

1. Run a locally available Redis instance, e.g. using `docker run --rm -it -p 6379:6379 redis:latest`

2. Publish the environment file, generate an application key and configure the Redis server as needed:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

3. Run Horizon using `php artisan horizon`

4. Run the web server using `php artisan serve --port=8080`

5. Access the web app at `http://127.0.0.1:8080` and dispatch some jobs

6. View the logs, e.g. using `tail -f storage/logs/laravel.log`

## License

This demo application is licensed under the [MIT license](https://opensource.org/licenses/MIT).
