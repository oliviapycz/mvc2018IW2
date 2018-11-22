# Views

## Goals:
* create models
* configure tables on phpmyadmin
* create a shared method

## What we've learned:
* create generic method save()
* method define()
* db connexion (PDO)
* method get_called_class()
* method get_object_vars()
* method get_class_vars()
* method get_class()
* method array_diff_keys()
* method array_keys()
* method implode()

## Steps:
* create folder models inside folder www
* create file Users.class.php inside of it with the class Users
* update myAutoLoader to include files in folder models
* create table Users on phpmyadmin with all the fields
* set all functions to treat inputs in class Users
* create class BaseSQL in core for Users to extends
* call __construct from a class we extend to
* create file to contain constant for db connexion
* create db connexion
* require this file into index.php

![VISUEL](https://github.com/oliviapycz/mvc2018IW2/raw/model/screenshot_table.png)