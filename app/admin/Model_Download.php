<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
use SleepingOwl\Admin\Admin;

Admin::model(\rGuard\Download::class)->title('Downloads')->as('downloads')->columns(function ()
{
    // Describing columns for table view
    Column::string('id', 'ID');
    Column::string('app.name', 'Product')->append(
        new \rGuard\LicenseColumnUrlAppendant("app")
    );
    Column::string('virtual_path');
})->form(function ()
{
    // Describing elements in create and editing forms
    FormItem::select('app_id', 'App')->list(\rGuard\App::class)->required(true);
    FormItem::text('virtual_path', 'Virtual Path')->required();
    FormItem::file('file');
});