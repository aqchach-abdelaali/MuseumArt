.DEFAULT_GOAL := help
.PHONY: help
help:
	@grep -h -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: install-php
install-php: ## install php dependencies via composer
	composer install

#.PHONY: install-js
#install-js: ## install js dependencies via yarn
#	yarn install

.PHONY: install
install: install-php #install-js ## install php and js dependencies

.PHONY: up
up: ## create the dev env database
	php bin/console doctrine:database:create

.PHONY: down
down: ## drop the dev env database
	php bin/console doctrine:database:drop --force

.PHONY: init-db
init-db: ## run migrations en dev env database
	php bin/console doctrine:migrations:migrate  --no-interaction

.PHONY: fixtures
fixtures: ## play fixtures en dev env database
	php bin/console doctrine:fixtures:load  --no-interaction

.PHONY: test
test: ## run tests
	bin/phpunit --testdox

#.PHONY: lint
#lint: cs-dry-run ## lint code
#	yarn run lint --fix

.PHONY: cs
cs: ## lint code
	./vendor/bin/php-cs-fixer fix --verbose

.PHONY: cs-dry-run
cs-dry-run: ## lint code and fix problems
	./vendor/bin/php-cs-fixer fix --dry-run --using-cache=no --diff --verbose --show-progress=dots

.PHONY: format
format: ## format code (js, css, html)
	yarn prettier --write "assets/**/*.(js|jsx)"
