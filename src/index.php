<?php

// include the required modules
require_once __DIR__."/includes/helpers.php";
require_once __DIR__."/includes/config.php";
require_once __DIR__."/includes/vendor/autoload.php";
require_once __DIR__."/includes/twilio-whatsapp-api.php";
require_once __DIR__."/includes/dropbox-api.php";


function index($key, $to, $body, $media='') {
    /**
     * Main REST API endpoint for the app.
     * 
     * @param String $to
     * @param String $body
     * @param Array $media
     * 
     * @return Array
    */

    // array to store all the errors
    $errors = array();

    if (!is_valid($key)) {
        $errors[] = "'to' parameter is either empty or invalid";
    }
    else {
        if (!confirm_hash($key)) {
            $errors[] = "Key is either incorrect or tampered";
            send_response(403, $errors_list=$errors);
        }
    }
    if (!is_valid($to)) {
        $errors[] = "'to' parameter is either empty or invalid";
    }
    if (!is_valid($body)) {
        $errors[] = "'body' parameter is either empty or invalid";
    }
    if ($media != '') {
        if ($media['error'] != 0) {
            $errors[] = "'media' parameter is invalid";
        }
    }

    // perform the request based on the errors array
    if (count($errors) != 0) {
        send_response(400, $errors_list=$errors);
    }
    else {
        // get a temporary link for the media if it is attached
        $media_url = ($media != '' ? upload_file($media) : '');
        
        // send the whatsapp message
        $response = send_whatsapp_message($to, $body, $media_url);

        $data = array();
        $data['account_sid'] = $response->accountSid;
        $data['body'] = $response->body;
        $data['direction'] = $response->direction;
        $data['from'] = $response->from;
        $data['num_media'] = $response->numMedia;
        $data['sid'] = $response->sid;
        $data['status'] = $response->status;
        $data['subresource_uris'] = $response->subresourceUris['media'];
        $data['to'] = $response->to;
        $data['uri'] = $response->uri;
        send_response(200, $errors_list=[], $data=$data);
    }
}


// get the POST variables
$to    = $_REQUEST['to'];
$body  = $_REQUEST['body'];
$media = $_FILES['media'];
$key = getallheaders()['Authorization'];


// send the request to the endpoint
index($key, $to, $body, $media);

?>