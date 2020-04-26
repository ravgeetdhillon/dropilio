<?php

// include the required modules
require_once __DIR__."/includes/helpers.php";


// send a 404 response
send_response(404, $errors_list=['Not found.']);

?>