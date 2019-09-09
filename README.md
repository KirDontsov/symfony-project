Установка
---------
~~~
git clone https://bitbucket.org/imitronov/symfony-project.git
cd symfony-project
composer update
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