#!/bin/bash

help: # Show help
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

run: ## Up docker containers
	docker-compose up -d --build
	docker-compose exec php composer install --no-scripts --no-interaction --optimize-autoloader
code-analyse: ## Analyse code
	docker-compose exec php vendor/bin/phpstan analyse -l 8 src tests
run-test: ## Run all tests
	docker-compose exec php vendor/bin/phpunit
