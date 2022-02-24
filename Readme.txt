composer create-project laravel/laravel electricBill
php artisan make:model City -mc
php artisan make:controller BillCalculator
php artisan migrate
php artisan db:seed


slabs
city     start_range end_range  per_unit_cost
bhopal   0            100           2
bhopal   100          200           4
bhopal   200          500           5

city

bhopal 
100
=============
2X100=200

Bhopal
250

0-100 =     200
100-200 =   400
200-500  50X5 = 250
==============
800


connect database into  ENV  file 
php artisan migrate
php artisan db:seed
php artisan serve
run your project on http://localhost:8000/
