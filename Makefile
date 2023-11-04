run-app-with-setup:
	docker compose build
	docker compose up -d
	docker exec php-web /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate & php artisan schedule:work"

run-app:
	docker compose up -d

kill-app:
	docker compose down

enter-nginx-container:
	docker exec -it nginx-web /bin/sh