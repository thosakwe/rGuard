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
6. Create an admin user as described [here](http://sleeping-owl.github.io/en/Commands/Administrators.html). Default is admin / SleepingOwl.
7. cd public
8. bower install