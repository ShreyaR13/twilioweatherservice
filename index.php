<?php
    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
    // following the instructions to install it with Composer.
    require_once 'twilio-php-master/Twilio/autoload.php'; // Loads the library
    require 'twilio-php-master/Services/Twilio.php';
    use Twilio\Rest\Client;

    // Step 2: Set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "ACc2ee9a0b7bd01ddfd3079fc23a433407";
    $AuthToken = "6a7fed7f68a9d89d75996bc165982d2b";

    // Step 3: Instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);

    try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            // Step 4: Change the 'To' number below to whatever number you'd like
            // to call.
            "+12016809992",

            // Step 5: Change the 'From' number below to be a valid Twilio number
            // that you've purchased or verified with Twilio.
            "+12674407881",

            // Step 6: Set the URL Twilio will request when the call is answered.
            array("url" => "https://troubled-gun-1513.twil.io/assets/voice_new.php")
        );
        echo "Started call: " . $call->sid;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
