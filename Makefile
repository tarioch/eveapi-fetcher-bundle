verify: checkstyle detectmess test

ifndef TARIOCH_BIN_DIR
export TARIOCH_BIN_DIR="@./vendor/bin"
endif

fullbuild: composer_install detectmess test_coverage upload_coverage

checkstyle:
	$(TARIOCH_BIN_DIR)/phpcs -s -p --standard=phpcs_rules.xml --extensions=php . || exit 2

detectmess:
	$(TARIOCH_BIN_DIR)/phpmd . text phpmd_rules.xml --suffixes php --exclude vendor,DoctrineMigrations || exit 3

test:
	$(TARIOCH_BIN_DIR)/phpunit || exit 4

test_coverage:
	$(TARIOCH_BIN_DIR)/phpunit --coverage-clover=coverage.clover || exit 4

upload_coverage:
	wget https://scrutinizer-ci.com/ocular.phar || exit 5
	php ocular.phar code-coverage:upload --format=php-clover coverage.clover || exit 5

composer_install:
	composer install || exit 1

.PHONY: verify fullbuild checkstyle detectmess test test_coverage upload_coverage composer_install
