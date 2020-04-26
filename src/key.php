<?php

// include the required modules
require_once __DIR__."/includes/helpers.php";
require_once __DIR__."/includes/config.php";


function index($twilio_sid, $twilio_token, $dropbox_key, $dropbox_secret, $dropbox_token) {
    /**
     * REST API endpoint for generating hash string.
     * 
     * @param String $twilio_sid
     * @param String $twilio_token
     * @param String $dropbox_key
     * @param String $dropbox_secret
     * @param String $dropbox_token
     * 
     * @return String
    */

    // array to store all the errors
    $errors = array();

    if (!is_valid($twilio_sid)) {
        $errors[] = "'TWILIO_SID' parameter is either empty or invalid";
    }
    if (!is_valid($twilio_token)) {
        $errors[] = "'TWILIO_TOKEN' parameter is either empty or invalid";
    }
    if (!is_valid($dropbox_key)) {
        $errors[] = "'DROPBOX_KEY' parameter is either empty or invalid";
    }
    if (!is_valid($dropbox_secret)) {
        $errors[] = "'DROPBOX_SECRET' parameter is either empty or invalid";
    }
    if (!is_valid($dropbox_token)) {
        $errors[] = "'DROPBOX_TOKEN' parameter is either empty or invalid";
    }

    // perform the request based on the errors array
    if (count($errors) != 0) {
        send_response(400, $errors_list=$errors);
    }
    else {
        $hash = generate_hash($twilio_sid, $twilio_token, $dropbox_key, $dropbox_secret, $dropbox_token);
        $data = array(
            "hash" => $hash
        );
        send_response(200, $errors_list=[], $data=$data);
    }
}


// get the POST variables
$twilio_sid     = $_REQUEST['TWILIO_SID'];
$twilio_token   = $_REQUEST['TWILIO_TOKEN'];
$dropbox_key    = $_REQUEST['DROPBOX_KEY'];
$dropbox_secret = $_REQUEST['DROPBOX_SECRET'];
$dropbox_token  = $_REQUEST['DROPBOX_TOKEN'];


// send the request to the endpoint
index($twilio_sid, $twilio_token, $dropbox_key, $dropbox_secret, $dropbox_token);

?>