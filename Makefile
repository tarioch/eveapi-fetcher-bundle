verify: test

fullbuild: composer_install test_coverage upload_coverage

test:
	@./vendor/bin/phpunit || exit 4

test_coverage:
	@./vendor/bin/phpunit --coverage-clover=coverage.clover || exit 4

upload_coverage:
	wget https://scrutinizer-ci.com/ocular.phar
	php ocular.phar code-coverage:upload --format=php-clover coverage.clover

composer_install:
	composer install || exit 1

.PHONY: verify fullbuild test test_coverage upload_coverage composer_install
