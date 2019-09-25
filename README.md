Установка
---------
~~~
git clone https://github.com/KirDontsov/symfony-project.git

OR

composer create-project symfony/skeleton my_project_name
cd symfony-project
composer update
composer require server
composer require annotations
composer require jms/serializer-bundle
composer require friendsofsymfony/rest-bundle
composer require generator
php bin/console make:controller
composer require doctrine

mysql -uroot
CREATE USER 'db_user'@'localhost' IDENTIFIED BY 'db_password';
GRANT ALL PRIVILEGES ON db_database . * TO 'db_user'@'localhost';
CREATE DATABASE db_name;
SHOW DATABASES;

php bin/console make:entity
(создаем поля базы данных)
php bin/console make:migration
php bin/console doctrine:migrations:migrate

composer req api

php bin/console doctrine:schema:update --force

php bin/console server:run


~~~

Добавление пользователя
-----------------------
Получить хеш строку для пароля:
~~~
php bin/console security:encode-password
~~~
Добавить в БД в таблицу `user` пользователя с полученным хешем. В ячейку `user`.`roles` вставить:
~~~
["ROLE_ADMIN"]
~~~
