default:
	@printf "$$HELP"

# Docker commands
docker-build:
	docker-compose build

docker-composer-install:
	@docker exec -it magento2-docker-master_php_1 bash -c "composer install --prefer-source --no-interaction"

docker-behat:
	@docker exec -it magento2-docker-master_php_1 bash -c "./vendor/bin/phpunit"

docker-down:
	docker-compose down && docker volume rm magento2-docker-master_db_data

docker-start:
	docker-compose up -d

docker-stop:
	docker-compose stop

docker-tests:
	@docker exec -it magento2-docker-master_php_1 bash -c "./vendor/bin/phpunit"

docker-coverage:
	@docker exec -it magento2-docker-master_php_1 bash -c "./vendor/bin/phpunit --coverage-text"

docker-ssh-php:
	@docker exec -it magento2-docker-master_php_1 bash

docker-ssh-web:
	@docker exec -it magento2-docker-master_nginx_1 bash

docker-clean-images:
	docker rmi $(docker images | tail -n +2 | awk '$1 == "<none>" {print $'3'}')

docker-clean-all:
	 docker-compose down && docker rmi magento2-docker-master_php_1 magento2-docker-master_db_1 magento2-docker-master_nginx_1

define HELP
# Docker
	- default:
	- docker-build:
	- docker-stop
	- docker-down:
	- docker-start:
	- docker-tests:
	- docker-coverage:
	- docker-ssh:

endef

export HELP