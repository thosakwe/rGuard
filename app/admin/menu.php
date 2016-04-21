<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu(\rGuard\User::class)->icon('fa-users');
Admin::menu(\rGuard\License::class)->icon('fa-credit-card');
Admin::menu(\rGuard\App::class)->icon('fa-laptop');
Admin::menu(\rGuard\Page::class)->icon('fa-file');
Admin::menu(\rGuard\Download::class)->icon('fa-download');