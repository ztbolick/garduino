<?php

class DB_CONNECT {
 
    // Constructor
    function __construct() {
        // Method to connect to the database after the object is instantiated
        $this->connect();
    }
 
    // Destructor
    function __destruct() {
        // Method call to close the connection to the database
        $this->close();
    }
 
   // Function to connect to the database
    function connect() {

        // importing dbconfig.php file which contains database credentials 
        $filepath = realpath (dirname(__FILE__));

        require_once($filepath.'/dbconfig.php');
        
		// Connecting to mysql (phpmyadmin) database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
 
        // Selecing database
        $db = mysqli_select_db($con, DB_DATABASE) or die(mysqli_connect_error());
 
        // returing connection cursor
        return $con;
    }
 
	// Function to close the database
    function close() {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
        
        // Closing data base connection
        mysqli_close($con);
    }
 
}
 
?>