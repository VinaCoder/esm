ifneq (,$(wildcard .env))
	include .env
endif

.PHONY: setup
setup:
	# install dependencies with dev
	composer install

	# generate key
	php artisan key:generate

.PHONNY: check
check:
	./vendor/bin/pint --test -v

.PHONNY: fix
fix:
	./vendor/bin/pint -v

.PHONY: test
test:
	php artisan test
