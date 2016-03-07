<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
use rGuard\User;
use SleepingOwl\Admin\Admin;

Admin::model(\rGuard\Page::class)->title('Pages')->as('pages')->columns(function () {
    // Describing columns for table view
    Column::string('id', 'ID');
    Column::string('title');
})->form(function () {
    // Describing elements in create and editing forms
    FormItem::text("title")->required();
    FormItem::ckeditor('html', 'Page Content');
    FormItem::checkbox("show_in_navbar", "Show in Navigation Bar?");
});