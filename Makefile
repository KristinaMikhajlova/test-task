create_env:
	docker exec -i test-php cp ./.env.dist ./.env

install_vendor:
	docker exec -i test-php composer install

prepare_database: create_database update_database

create_database:
	docker exec -i test-php php bin/console d:d:c

update_database:
	docker exec -i test-php php bin/console d:s:u --force

enable_management_plugin:
	docker exec -i test-rabbitmq rabbitmq-plugins enable rabbitmq_management

run_sum_consumer:
	docker exec -i test-php php bin/console messenger:consume sum
