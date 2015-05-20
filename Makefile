verify: checkstyle detectmess test

fullbuild: detectmess test_coverage upload_coverage

checkstyle:
	@./vendor/bin/phpcs -s -p --colors --standard=phpcs_rules.xml --extensions=php --ignore=vendor . || exit 2

checkstyleFix:
	@./vendor/bin/phpcbf -s -p --colors --standard=phpcs_rules.xml --extensions=php --ignore=vendor . || exit 2

detectmess:
#	@./vendor/bin/phpmd . text phpmd_rules.xml --suffixes php --exclude vendor || exit 3

test:
	@./vendor/bin/phpunit || exit 4

test_coverage:
	@./vendor/bin/phpunit --coverage-clover=coverage.clover || exit 4

upload_coverage:
	wget https://scrutinizer-ci.com/ocular.phar || exit 5
	php ocular.phar code-coverage:upload --format=php-clover coverage.clover || exit 5

.PHONY: verify fullbuild checkstyle detectmess test test_coverage upload_coverage composer_install
