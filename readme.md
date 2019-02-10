После установки: 

1. Выполните composer install 
2. Скопируйте содержимое файла .env.example в новый файл .env , укажите DB_HOST, DB_PORT ,DB_DATABASE,DB_USERNAME,DB_PASSWORD.
3. Запустите php artisan key:generate для генерации ключа приложения.
4. Запустите php artisan run:project чтобы создать необходимые таблицы и заполнить их тестовыми данными.
