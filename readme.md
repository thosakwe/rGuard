#rGuard

rGuard is a PHP package allowing you to set up a self-hosted licensing
system. It comes complete with eCommerce support, as well as a
complete admin panel.

#Installation with Homestead

1. composer install
2. Configure your local Homestead box as described [here](http://laravel.com/docs/5.1/homestead#per-project-installation).
3. php artisan key:generate
4. php artisan vendor:publish
5. Configure .env (ENABLE_HTTPS, DATABASE_*, MAIL_*)
6. php artisan cashier:table
7. php artisan migrate
8. Create an admin user as described [here](http://sleeping-owl.github.io/en/Commands/Administrators.html). Default is admin / SleepingOwl.
9. cd public
10. bower install