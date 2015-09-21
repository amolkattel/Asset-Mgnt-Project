<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Users
Breadcrumbs::register('users.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users.index'));
});

// Home > Users
Breadcrumbs::register('users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Create User', route('users.create'));
});

// Home > Users
Breadcrumbs::register('users.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Edit User', route('users.edit'));
});

// Home > Roles
Breadcrumbs::register('roles.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Roles', route('roles.index'));
});

// Home > Roles
Breadcrumbs::register('roles.create', function($breadcrumbs)
{
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push('Create Role', route('roles.create'));
});

// Home > Roles
Breadcrumbs::register('roles.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push('Edit Role', route('roles.edit'));
});

// Home > Permissions
Breadcrumbs::register('permissions.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Permissions', route('permissions.index'));
});

// Home > Permissions
Breadcrumbs::register('permissions.create', function($breadcrumbs)
{
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push('Create Permission', route('permissions.create'));
});

// Home > Permissions
Breadcrumbs::register('permissions.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push('Edit Permission', route('permissions.edit'));
});

// Home > Departments
Breadcrumbs::register('departments.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Departments', route('departments.index'));
});

// Home > Departments
Breadcrumbs::register('departments.create', function($breadcrumbs)
{
    $breadcrumbs->parent('departments.index');
    $breadcrumbs->push('Create Department', route('departments.create'));
});

// Home > Departments
Breadcrumbs::register('departments.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('departments.index');
    $breadcrumbs->push('Edit Department', route('departments.edit'));
});

// Home > Employees
Breadcrumbs::register('employees.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Employees', route('employees.index'));
});

// Home > Employees
Breadcrumbs::register('employees.create', function($breadcrumbs)
{
    $breadcrumbs->parent('employees.index');
    $breadcrumbs->push('Create Employee', route('employees.create'));
});

// Home > Employees
Breadcrumbs::register('employees.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('employees.index');
    $breadcrumbs->push('Edit Employee', route('employees.edit'));
});

// Home > Assets
Breadcrumbs::register('assets.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Assets', route('assets.index'));
});

// Home > Assets
Breadcrumbs::register('assets.create', function($breadcrumbs)
{
    $breadcrumbs->parent('assets.index');
    $breadcrumbs->push('Create Asset', route('assets.create'));
});

// Home > Assets
Breadcrumbs::register('assets.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('assets.index');
    $breadcrumbs->push('Edit Asset', route('assets.edit'));
});

// Home > Assets > map
Breadcrumbs::register('assets.map', function($breadcrumbs)
{
    $breadcrumbs->parent('assets.index');
    $breadcrumbs->push('Map', route('assets.map'));
});

// Home > Assets > map
Breadcrumbs::register('assets.show', function($breadcrumbs)
{
    $breadcrumbs->parent('assets.index');
    $breadcrumbs->push('Detail', route('assets.show'));
});

// Home > Categories
Breadcrumbs::register('categories.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categories', route('categories.index'));
});

// Home > Categories
Breadcrumbs::register('categories.create', function($breadcrumbs)
{
    $breadcrumbs->parent('categories.index');
    $breadcrumbs->push('Create Category', route('categories.create'));
});

// Home > Categories
Breadcrumbs::register('categories.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('categories.index');
    $breadcrumbs->push('Edit Category', route('categories.edit'));
});

// Home > Vendors
Breadcrumbs::register('vendors.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Vendors', route('vendors.index'));
});

// Home > Vendors
Breadcrumbs::register('vendors.create', function($breadcrumbs)
{
    $breadcrumbs->parent('vendors.index');
    $breadcrumbs->push('Create Vendor', route('vendors.create'));
});

// Home > Vendors
Breadcrumbs::register('vendors.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('vendors.index');
    $breadcrumbs->push('Edit Vendor', route('vendors.edit'));
});