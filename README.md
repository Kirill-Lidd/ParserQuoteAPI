## Установка
1.
    `composer install`
2. Скопировать файл .env.example и переименовать в .env
3. Подключиться к базе данных
4. 
    `php artisan key:generate`
5.
    `php artisan migrate`
## Доступ к API
1. Создать аккаунт и получить API токен
2. Перейти по URL
`/api/<полученный токен>/quotation/<дата в формате: дд-мм-гггг>
