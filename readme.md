#rGuard

rGuard is a PHP package allowing you to set up a self-hosted licensing
system. It comes complete with eCommerce support, as well as a
complete admin panel. It also lets you create custom pages, and even
incorporate a blog. It's the complete software you need to sell
**your** software.

#Installation with Homestead

Prerequisites:

1. Composer
2. Vagrant
3. Bower

1. Install PHP intl extension
2. composer install
3. Configure your local Homestead box as described [here](http://laravel.com/docs/5.1/homestead#per-project-installation).
4. php artisan key:generate
5. php artisan vendor:publish
6. Configure .env (ENABLE_HTTPS, DATABASE_*, MAIL_*)
7. php artisan cashier:table
8. php artisan migrate
9. php artisan admin:install
10. Create an admin user as described [here](http://sleeping-owl.github.io/en/Commands/Administrators.html). Default is admin / SleepingOwl.
11. bower install
12. Configure WordPress if using blog - Navigate to yoursite.com/blog

#Todo
1. Your mom
2. My licenses
3. license panel
4. Complete admin panel
7. IP log on downloads?
8. REST API + Docs
9. Edit profile
10. Feedback
11. License-protected files/uploads
12. .env.example
13. Expiration cron job + send e-mail, also give a notification 7 days before expiration
14. Documentation - videos, guide for accepting Bitcoin
15. Downloads should be encrypted with license code
16. APP_DEBUG=false