#!bin/bash

git pull
composer update
php bin/console d:s:u --force
php bin:console c:c
php bin/console hautelook_alice:doctrine:fixtures:load