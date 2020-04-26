<?php


// restrict direct entry to the code
if (!count(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))) {
    send_response(403, $errors_list=['Not allowed.']);
    die(1);
}


// use PHP SDK for Twilio Whatsapp API
use Twilio\Rest\Client;


function send_whatsapp_message($to, $body, $media_url='') {
    /**
     * Send a Whatsapp message.
     * 
     * @param String $to
     * @param String $body
     *
     * @return Object
    */

    $request_array = array();
    $request_array['from'] = "whatsapp:".$GLOBALS['REGISTERED_NUMBER'];
    $request_array['body'] = $body;
    if ($media_url != '') {
        $request_array['mediaUrl'] = [$media_url];
    }

    $client = new Client($GLOBALS['TWILIO_SID'], $GLOBALS['TWILIO_TOKEN']);

    $response = $client->messages->create(
        "whatsapp:".$to,
        $request_array
    );

    return $response;
}

?>