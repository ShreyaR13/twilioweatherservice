<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $city = $_GET['City'];

    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL,'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=ef77ade3db3ce484b43606e2095ff696&units=imperial');
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));

if ($jsonData->cod == 200) {
    $tempData = $jsonData->main;
    $cityName = $jsonData->name;

    echo "<Response>
    <Say voice=\"alice\">
    City name is " . $cityName . ".
    Current Temperature is " . $tempData->temp . ".
    Minimum Temperature is " . $tempData->temp_min . ".
    Maximum Temperature is " . $tempData->temp_max . ".
    Temperature Unit is Fahrenheit.
    </Say>
    <Pause length=\"1\"/>
    <Say voice=\"alice\">
    Thanks for you message, have a Good One.
    </Say>
    </Response>";

}else{
            echo "<Response>
            <Say voice=\"alice\">
            Please enter valid city name! Or it might be a server error.
            </Say>
        </Response>
        ";
}
    curl_close($curlSession);
