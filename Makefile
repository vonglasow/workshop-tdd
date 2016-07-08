install: vendor coverage

tests: install phpunit atoum

coverage:
	@mkdir -p coverage/phpunit
	@mkdir -p coverage/atoum

phpunit:
	@./vendor/bin/phpunit -c phpunit.xml

atoum:
	@./vendor/bin/atoum -d tests/units

tdd:
	@./vendor/bin/atoum --autoloop -d tests/units --debug

vendor: composer.phar
	@./composer.phar install

composer.phar:
	@curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1;

clean:
	@rm -rf vendor composer.phar coverage

