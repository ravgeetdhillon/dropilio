<?php

// set the header for the json response
header('Content-Type: application/json');


// include the helper module and initialize the environment
require "helpers.php";
init_environment();


// send a 404 response
send_response(404, $errors_list=['Not found.']);

?>