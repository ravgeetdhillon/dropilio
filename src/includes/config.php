<?php

// restrict direct entry to the code
if (!count(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))) {
    send_response(403, $errors_list=['Not allowed.']);
    die(1);
}


// credentials provided by Twilio
$TWILIO_SID = getenv("TWILIO_SID");
$TWILIO_TOKEN = getenv("TWILIO_TOKEN");
$REGISTERED_NUMBER = getenv("TWILIO_PHONE_NUMBER");


// credentials provided by Dropbox
$DROPBOX_KEY = getenv("DROPBOX_KEY");
$DROPBOX_SECRET = getenv("DROPBOX_SECRET");
$DROPBOX_TOKEN = getenv("DROPBOX_TOKEN");


?>