<form method="post">
    <p>Email: <input type="text" name="email" /></p>
    <p>Location_id: <input type="text" name="location_id" /></p>
    <p>Location_name: <input type="text" name="location_name" /></p>
    <p>UUID: <input type="text" name="UUID" /></p>
    <p>Major: <input type="text" name="major" /></p>
    <p>Minor: <input type="text" name="minor" /></p>
    <p>Longitude: <input type="number" step="any" name="longitude" /></p>
    <p>Latitude: <input type="number" step="any" name="latitude" /></p>
    <p>Beacon_code: <input type="text" name="beacon_code" /></p>
    <input type="submit" name="submit" value="submit"/>
</form>

<?php
if (isset($_POST['email']) &&
        isset($_POST['location_id']) &&
        isset($_POST['location_name']) &&
        isset($_POST['UUID']) &&
        isset($_POST['major']) &&
        isset($_POST['minor']) &&
        isset($_POST['longitude']) &&
        isset($_POST['latitude']) &&
        isset($_POST['beacon_code']) &&
        isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email');
    $location_id = filter_input(INPUT_POST, 'location_id');
    $location_name = filter_input(INPUT_POST, 'location_name');
    $UUID = filter_input(INPUT_POST, 'UUID');
    $major = filter_input(INPUT_POST, 'major');
    $minor = filter_input(INPUT_POST, 'minor');
    $longitude = filter_input(INPUT_POST, 'longitude');
    $latitude = filter_input(INPUT_POST, 'latitude');
    $beacon_code = filter_input(INPUT_POST, 'beacon_code');

    $data = array(
        'email' => "$email",
        'location_id' => $location_id,
        'location_name' => "$location_name",
        'UUID' => "$UUID",
        'major' => $major,
        'minor' => $minor,
        'longitude' => $longitude,
        'latitude' => $latitude,
        'beacon_code' => "$beacon_code",
            //'submit' => 'submit'
    );


//Connectione
//$url = 'http://lamp.scim.brad.ac.uk:50891/web_service.php';
//$url = 'http://localhost/PhpProject1/index.php/';
    //$url = 'http://localhost/PhpProject1/web_service.php/';
   $url ="http://ben.bradweb.co.uk/web_service.php";
    $ch = curl_init($url);

//Form data string
    $postString = http_build_query($data, '', '&');

//Setting Options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Get the respons
    $response = curl_exec($ch);
    print_r($response);
    curl_close($ch);
}