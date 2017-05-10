Installed Laravel via composer
```
composer global require "laravel/installer"
```

Add laravel composer into PATH var

```
echo '\nexport PATH="$PATH:$HOME/.config/composer/vendor/bin"' >> ~/.profile
```

create Laravel App
```
mkdir /var/www/git/laravel-api-bematech/ && cd $_
laravel new api
```

solve some errors by installing php components
```
sudo apt-get install php7.0-zip php7.0-mbstring 
```

Install MySQL Server (CE) and PHP Driver, configure it and start service
```
sudo apt-get install mysql-server
sudo apt-get install php7.0-mysql
```

in Laravel folder create the key and setup .env
```
cd /var/www/git/laravel-api-bematech/api
cp .env.example .env
php artisan key:generate
```

run migrations
```
php artisan migrate
```

```
mysql> alter table clients add name varchar(200) after id;
mysql> alter table products add name varchar(300) after id;

```

Run tests with PHPUnit
installed via composer globally:
```
composer global require phpunit/phpunit ^5.7
phpunit
```
or using 
```
./vendor/bin/composer/
```

Run tests using testdox or tap mode
```
vendor/bin/phpunit --testdox
vendor/bin/phpunit --tap
vendor/bin/phpunit  --testdox && vendor/bin/phpunit --tap
```
