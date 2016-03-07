<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
use rGuard\User;
use SleepingOwl\Admin\Admin;

Admin::model(\rGuard\License::class)->title('Licenses')->as('licenses')->columns(function () {
    // Describing columns for table view
    Column::string('id', 'ID');
    Column::string('user.name', 'User')->append(
        new \rGuard\LicenseColumnUrlAppendant("user")
    );
    Column::string('app.name', 'Product')->append(
        new \rGuard\LicenseColumnUrlAppendant("app")
    );
    Column::string('licensed_to', 'Licensee');
    Column::string('downloads', 'Times User has Downloaded');
})->form(function () {
    // Describing elements in create and editing forms
    FormItem::select('app_id', 'App')->list(\rGuard\App::class)->required(true);
    FormItem::select('user_id', 'User')->list(User::class)->required(true);
    FormItem::text('code')->required()->unique()->validationRule('min:23')->attributes([
        'placeholder' => 'Min. 23 chars, format: XXXXX-XXXXX-XXXXX-XXXXX'
    ]);
    FormItem::view("admin.generate_license_code");
    FormItem::text('licensed_to')->required()->attributes(['placeholder' => 'ex: John Doe']);
    FormItem::date('expires', 'Expires (can be blank)')->attributes(['data-hide']);
});