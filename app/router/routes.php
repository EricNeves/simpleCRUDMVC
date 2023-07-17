<?php

$routes = [
  '/' => 'HomeController@index',
  '/page/{id}' => 'HomeController@index',
  '/login' => 'HomeController@login',
  '/verify' => 'HomeController@verifyCredentials',
  '/logout' => 'HomeController@logout',
  '/profile/{id}' => 'HomeController@profile',
  '/update-profile' => 'HomeController@updateProfile',

  '/add' => 'ProductController@index',
  '/create-product' => 'ProductController@create',
  '/edit/{id}' => 'ProductController@edit',
  '/delete' => 'ProductController@delete',
  '/update-product' => 'ProductController@updateProduct'
];