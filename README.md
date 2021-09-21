# Runroom Backen Test.

## Dev environment.
The environment has been mounted on a php7.4 docker container. 
To setup a dev environment just need to run make run in the root folder.

## Makefile.

A Makefile file is provided with the following rules:

``` Makefile
make run # Build containers and run them
make run-test # Run tests
make code-analyse # Run phpStan
make help # Show all available rules
```

## Github Actions.

Repository has an automated action when push is done. 
This action runs php-cs-fixer over src folder to fix our code to follow Symfony standard.