<?php
    require_once 'twilio-php-master/Twilio/autoload.php'; // Loads the library
    require 'twilio-php-master/Services/Twilio.php';
    use Twilio\Rest\Client;
    $account_sid = 'ACc2ee9a0b7bd01ddfd3079fc23a433407';
    $auth_token = '6a7fed7f68a9d89d75996bc165982d2b';
    $client = new Client($account_sid, $auth_token);

$number = $_POST['From'];
$body = $_POST['Body'];
$url = 'api.openweathermap.org/data/2.5/weather?q=London&APPID=ef77ade3db3ce484b43606e2095ff696';
$file = file_get_contents($url);
$data = json_decode($file, true);
global $city.name;

foreach ($data as $character) {
        if($character['London'] == $body) {
          $temp_min = $character['temp_min'];
          $temp_max = $character['temp_max'];
            break;
        }
}
            try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            $number,
            "+12674407881",
            // Step 6: Set the URL Twilio will request when the call is answered.
           //array("url" => "http://demo.twilio.com/welcome/voice/")
           array("url" => "https://troubled-gun-1513.twil.io/assets/voice.php")
        );

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

header('Content-Type: text/xml');
?>
