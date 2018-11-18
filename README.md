# Router

## Goals:
* create a basic router to navigate between pages 
* create a .htaccess file to redirect to index.php if wrong url
* create a routes.yml files to manage different routes

## What we've learned:
* create a class
* method yaml_parse_file() to get all routes in our yml file
* verify if controller and action exists in yml file
* method ucfirst() to put the first lette of a string in capital letter
* Super global $_SERVER["REQUEST_URI"] to get the slug in the url, what is after localhost like users/add
* method file_exists() to check if a file exists
* method explode() to delete ?=string for our slug, we only want the slug
* methos is_null() to check if the route exists
* method extract() to transform an array to several variables taking their name for the keys
* method class_exists() to check if a class exists
* method method_exists() to check if th emethod exists
* dynamically instanciate a controller
* difference between include and require


## Steps:
* in www folder create a core folder to receive the file Router.class.php
* in this file create the class Routing with two functions
  * getRoute
  * getSlug
* create the routes.yml in www
* create a folder controllers with two controllers:
  * PagesController.class.php
  * UsersController.class.php
* in index.php create the function myAutoloader that will check if the class that we're trying to instanciate exists in the core folder
* associate it with the method spl_autoload_register() that will call the function if the class we're trying to instanciate doesn't exists. It will give a Fatal error