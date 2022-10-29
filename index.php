<?php

// Include or include_once is a way to embed other php pages/scripts within another php script.
// This includes a file lib.php that is ONLY full of functions and therefore does not 'Output' anything or have its
// own page contents.
include_once('lib/lib.php');

// This include currently does not work, uncomment it and try it out.
// include_once('config/dbconnect.php');

// This print_header calls the function that is defined below.
print_header();

echo '<p> Example paragraph that says a bunch of nothing.';

// This function comes from test.php, try including it above and uncommenting the command.
// print_title($title='Reality can be whatever I want.');


print_close_page();

/**
 * ---------------------------------------
 *  FUNCTIONS 
 * ---------------------------------------
*/

// Example functio that prints header info.
function print_header() {
    // Because of the way HTML works, it is necessary to start the head and body and close it after the page contents.
    echo 
        '<html>
            <head>
                <title>Climatact</title>
            </head>
            
            <body>';
            
    
    // You can imagine that the above head, title, and body declarations could be their own function, and the below
    // HTML that creates a div container and outputs Climatact as an H1 header could also be made into its own function.
    echo 
        '<div class="container">
            <h1>Climatact</h1>
        </div>';
}

// This function is necessary to close the actual html and body tags after printing or outputing your desired data.
function print_close_page(){
    echo  
            '</body>
        </html>';
}

// This is a test query that uses the global variable $connection, that is defined in ./config/dbconnect.php
// This also does not work for now bc the db connection using oci_connect has not been properly established.
function test_query() {
    // Need connection for execution.
    global $connection;

    // test sql statement.
    $sql = 'SELECT * FROM Country';

    // $SQL can be whatever we want
    $statement = oci_parse($connection, $sql);

    oci_execute($statement);

    while ($row = oci_fetch_object($statement)) {
        var_dump($row);
    }


    // VERY important to close Oracle Database Connections and free statements!
    oci_free_statement($statement);
    oci_close($connection);
}