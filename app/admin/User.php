<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
Admin::model('\User')->title('Users')->as('users-alias-name')->denyCreating()->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	return ($instance->id <= 2) || ($instance->email == 'admin');
})->columns(function ()
{
	// Describing columns for table view
	Column::string('name', 'Name');
	Column::string('email', 'Email');
})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name')->required();
	FormItem::text('email', 'Email')->required();
});