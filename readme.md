# Тестовы CRUD и API на Laravel

## Запуск
1. Указать данные для подключения к БД в .env
2. Выполнить 
```
composer update
php artisan migrate
php artisan serve
```

## JSON API

Адрес API http://127.0.0.1:8000/api/

#### Доступные методы
- GET news
- POST news {title:string, text:string}
- GET news/{id}
- PUT news/{id} {title:string, text:string}
- DELETE news/{id}

## Запуск тестов
```phpunit```
