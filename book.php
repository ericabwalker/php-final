<?php

Class Book {
    public $title;
    public $author;
    public $pages;
    public $category;

    //uses a namespace

    //Inserts or updates a record into the database using a save() method on the model
    public function add_book() {

    }

    // Has static methods on the model for find() and findAll() for fetching model records
    public function find() {

    }

    public function findAll() {

    }

    //Inserts or updates a record into the database using a save() method on the model
    public function save() {

    }

    //Deletes the record from the database using a destroy() method on the model
    public function destroy() {

    }
}


?>

<!-- 
Illustrates CRUD functions on a model (all database interaction should happen at the model layer)

Validates properties on the model using a validate() function which returns true or false as to whether or not the 
model is valid 

The model's validate() function should feed data to an errors() function that returns an array of errors (if any)

The model's save function should return true or false if a insert or update was successful, and should validate the model 
prior to attempting to save. If the model is invalid, the save() should not complete and should return false.

If a model does not save for some reason, the user should be returned to the create or update view and be shown the errors.
-->