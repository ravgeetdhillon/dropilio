<?php

function init_environment() {
    /**
     * Setup the error reporting if the development environment is set.
    */

    if (getenv('ENVIRONMENT_TYPE') == "dev") {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
}


function send_response($http_code, $errors_list=[], $data=[]) {
    /**
     * Send a JSON response.
     * 
     * @param Integer $http_code
     * @param Array $errors_list
     * @param Array $data
     *
     * @return HttpStatusCode
    */

    $response = array(
        "data" => $data,
        "errors" => count($errors_list),
        "errors_list" => $errors_list,
        "status" => $http_code,
    );
    
    http_response_code($http_code);
    print_r(json_encode($response, JSON_PRETTY_PRINT));
    die(1);
}


function is_valid($var) {
    /**
     * Send a JSON response.
     * 
     * @param String $var
     *
     * @return Boolean
    */

    if (isset($var)) {
        if (!empty(trim($var))) {
            return true;
        }
    }
    return false;
}


function generate_hash($twilio_sid, $twilio_token, $dropbox_key, $dropbox_secret, $dropbox_token) {
    /**
     * Create a random hash string.
     *
     * @return String
    */

    // create a random key to generate a unique hash
    $random_key = substr(hash('sha256', mt_rand().microtime()), 0, 20);

    // sequence for generating a hash
    $hash_sequence = "$random_key|$twilio_sid|$twilio_token|$dropbox_key|$dropbox_secret|$dropbox_token";
    $hash = strtolower(hash('sha512', $hash_sequence));
    return $hash;
}


function confirm_hash($hash) {
    /**
     * Confirm an existing hash.
     *
     * @param String $hash
     *
     * @return Boolean
    */

    // sequence for generating a hash

    if ($_SERVER['DROPILIO_KEY'] == $hash) {
        return true;
    }
    return false;
}

// set the header for the json response
header('Content-Type: application/json');


// initialize the environment
init_environment();


// restrict direct entry to the code
if (!count(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))) {
    send_response(403, $errors_list=['Not allowed.']);
    die(1);
}

?>