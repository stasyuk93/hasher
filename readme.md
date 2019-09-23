Laravel v.5.8

Tutorial for docker:

1) clone repository and rename .env.example to .env
2) run command in folder project sudo docker-compose up -d --build;
3) run command sudo docker-compose up -d;
4) run command sudo docker exec -it hasher_php bash;
5) run command in container:
    1) composer install
    2) php artisan migrate
    3) exit
    
open http://127.0.0.1:800

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
