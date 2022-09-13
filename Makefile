up:
	docker-compose up -d
down:
	docker-compose down --remove-orphans
build:
	docker-compose build
composer-install:
	docker-compose exec calculate-online-php composer install
test:
	docker-compose exec calculate-online-php php artisan test
migrate:
	docker-compose exec calculate-online-php php artisan migrate
migrate-test:
	docker-compose exec calculate-online-php php artisan migrate --env=testing
pint:
	docker-compose exec calculate-online-php ./vendor/bin/pint -v
npm-run-dev:
	docker-compose run --rm calculate-node npm run dev
npm-run-build:
	docker-compose run --rm calculate-node npm run build
npm-install:
	docker-compose run --rm calculate-node npm install
