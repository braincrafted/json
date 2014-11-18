test:
	./vendor/bin/phpunit -c ./

code-coverage:
	./vendor/bin/phpunit -c ./ --coverage-html=./build/coverage
