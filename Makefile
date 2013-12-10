verify: checkstyle detectmess test

fullbuild: composer_install checkstyle detectmess test_coverage upload_coverage

checkstyle:
	@./vendor/bin/phpcs -s -p --standard=phpcs_rules.xml --extensions=php . || exit 2

detectmess:
	@./vendor/bin/phpmd . text phpmd_rules.xml --suffixes php --exclude vendor,DoctrineMigrations || exit 3

test:
	@./vendor/bin/phpunit || exit 4

test_coverage:
	@./vendor/bin/phpunit --coverage-clover=coverage.clover || exit 4

upload_coverage:
	wget https://scrutinizer-ci.com/ocular.phar || exit 5
	php ocular.phar code-coverage:upload --format=php-clover coverage.clover || exit 5

composer_install:
	composer install || exit 1

.PHONY: verify fullbuild checkstyle detectmess test test_coverage upload_coverage composer_install
