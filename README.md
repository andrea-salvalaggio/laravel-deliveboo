# Deliveboo
> Deliveboo is a food delivery web app that allows customers to order food from their favorite restaurant without registration, but entering only the
  data necessary for delivery (Credit card number, name, address). Restaurateurs can register in the platform and create, modify and delete dishes and
  see customers orders.


## Table of Contents
- [Setup](#setup)
- [Run](#run)
- [User Credential](#user-credential)
- [Team](#team)


## Setup
- Start MAMP
- Create database
- Duplicate file `.env.example` → rename it as `.env` → insert info (name, port and password)


## Run
- Use these comands to **install** properly the project
```
composer install
npm install
php artisan key:generate
php artisan storage:link
php artisan cache:clear
php artisan config:cache
php artisan migrate --seed
```

- Use these comands to **run** properly the project
```
npm run watch
php artisan serve
```


## User Credential
Login in the Dashboard with the following credentials:
- Email: deliveboo1@ciao.com
- Password: team4


## Team
- [Andrea Salvalaggio](https://github.com/andrea-salvalaggio)
- [Stefano Calarota](https://github.com/stecala)
- [Alessio Calabrese](https://github.com/AlessioCalabrese1)
- [Antonino Spena](https://github.com/Vegadrone)
- [Thuan Van Nguyen](https://github.com/revanderground)
