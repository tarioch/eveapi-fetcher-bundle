verify: test

fullbuild: composer_install verify

test:
	@./vendor/bin/phpunit || exit 4

composer_install:
	composer install || exit 1

.PHONY: verify fullbuild test composer_install
