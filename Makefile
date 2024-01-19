run:
	docker compose build
	docker compose up -d
	docker exec php-web /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate & php artisan schedule:work"

kill:
	docker compose down