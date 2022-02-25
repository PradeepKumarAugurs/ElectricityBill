git clone https://github.com/PradeepKumarAugurs/ElectricityBill.git
cd ElectricityBill
composer update
first duplicate the .env file and rename into  .env
php artisan key:generate
connect database into  ENV  file
php artisan migrate
php artisan db:seed
php artisan serve
run your project on http://localhost:8000/

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



