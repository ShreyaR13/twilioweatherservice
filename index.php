<?php
    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
    // following the instructions to install it with Composer.
    require_once 'twilio-php-master/Twilio/autoload.php'; // Loads the library
    require 'twilio-php-master/Services/Twilio.php';
    use Twilio\Rest\Client;

    $number = $_POST['From'];
    $body = $_POST['Body'];

    // Step 2: Set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "";
    $AuthToken = "";

    // Step 3: Instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);

    try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            // Step 4: Change the 'To' number below to whatever number you'd like
            // to call.
            $number,

            // Step 5: Change the 'From' number below to be a valid Twilio number
            // that you've purchased or verified with Twilio.
            "+12674407881",

            // Step 6: Set the URL Twilio will request when the call is answered.
            array("url" => "https://twilioweatherservice.herokuapp.com/voice_new.php?City=" . $body)
        );
        echo "Started call: " . $call->sid;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
