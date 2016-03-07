<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
use SleepingOwl\Admin\Admin;

Admin::model(\rGuard\App::class)->title('Products')->as('products')->columns(function ()
{
    // Describing columns for table view
    Column::string('id', 'ID');
    Column::image('image');
    Column::string('name');
    Column::string('tagline');
    Column::string('version');
})->form(function ()
{
    // Describing elements in create and editing forms
    FormItem::text('name', 'Name')->required();
    FormItem::text('tagline', 'Tagline');
    FormItem::textarea('description', 'Description')->required();
    FormItem::text('days_to_expire', 'Default License Duration (days)')->default(0)->validationRule('numeric|min:0')->attributes([
        'placeholder' => 'Set to 0 to make licenses last forever'
    ]);
    FormItem::textAddon('price', 'Price')->addon('$')->placement('before')->required()->validationRule('min:0')->attributes([
        'placeholder' => 'Minimum $0'
    ]);
    FormItem::text('version', 'Version')->required();
    FormItem::checkbox('featured', 'Featured Item');
    FormItem::image('image');
    FormItem::file('file', 'File (the download you are actually selling');
});