<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Columns\Column;
use SleepingOwl\Admin\Models\Form\FormItem;

Admin::model(\rGuard\User::class)->title('Users')->as('users')->columns(function ()
{
	// Describing columns for table view
	Column::string('name', 'Name');
	Column::string('email', 'Email');
})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name');
	FormItem::text('email', 'Email');
});