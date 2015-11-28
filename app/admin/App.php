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
    FormItem::text('name', 'Name');
    FormItem::text('tagline', 'Tagline');
    FormItem::textarea('description', 'Description');
    FormItem::textAddon('price', 'Price')->addon('$')->placement('before');
    FormItem::text('version', 'Version');
    FormItem::checkbox('featured', 'Featured Item');
    FormItem::image('image');
});