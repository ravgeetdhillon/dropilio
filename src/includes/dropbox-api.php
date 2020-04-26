<?php

// restrict direct entry to the code
if (!count(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS))) {
    send_response(403, $errors_list=['Not allowed.']);
    die(1);
}

// use PHP SDK for Dropbox APIv2
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;


function upload_file($file) {
    /**
     * Upload a local file to the Dropbox app.
     * 
     * @param String $local_file_path
     *
     * @return String
    */

    $local_file_name = $file['name'];
    $local_file_path = $file['tmp_name'];

    $app = new DropboxApp($GLOBALS['DROPBOX_KEY'], $GLOBALS['DROPBOX_SECRET'], $GLOBALS['DROPBOX_TOKEN']);
    $dropbox = new Dropbox($app);
    $dropbox_file = new DropboxFile($local_file_path);
    
    $file = $dropbox->upload($dropbox_file, "/" . date("Ymdhis") . $local_file_name, ['autorename' => true]);
    $file = $dropbox->getTemporaryLink($file->getPathDisplay());
    $file_link = $file->getLink();
    
    return $file_link;
}

?>