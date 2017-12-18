<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $number = $_POST['From'];
    $body = $_POST['Body'];
    $url = 'api.openweathermap.org/data/2.5/weatherq=city.name&APPID=ef77ade3db3ce484b43606e2095ff696';
    $file = file_get_contents($url);
        foreach ($data as $character) {
        if($character['city.name'] == $body) {
          $temperature.min = $character['temperature.min'];
          $temperature.max = $character['temperature.max'];
        echo "<Response>
            <Say>
                   Minimum Temperature of " . $city.name . " is " . $temperature.min . "
                   Maximum Temperature of " . $city.name . " is " . $temperature.max . "
                   Temperature Unit " . $city.name . " is " . $temperature.unit . "

            </Say>
        </Response>
        ";
            break;
        }
    }
    header('Content-Type: text/xml');
?>
