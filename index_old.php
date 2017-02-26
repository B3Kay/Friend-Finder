<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            <p>Email: <input type="text" name="email" /></p>
            <p>Location_id: <input type="text" name="location_id" /></p>
            <p>Location_name: <input type="text" name="location_name" /></p>
            <p>UUID: <input type="text" name="UUID" /></p>
            <p>Major: <input type="text" name="major" /></p>
            <p>Minor: <input type="text" name="minor" /></p>
            <input type="submit" name="submit" value="submit"/>
        </form>
        <?php
        include 'db.php';
        if (isset($_POST['submit'])) {
            $email = sanitize(filter_input(INPUT_POST, 'email'));
            $location_id = sanitize(filter_input(INPUT_POST, 'location_id'));
            $location_name = sanitize(filter_input(INPUT_POST, 'location_name'));
            $UUID = sanitize(filter_input(INPUT_POST, 'UUID'));
            $major = sanitize(filter_input(INPUT_POST, 'major'));
            $minor = sanitize(filter_input(INPUT_POST, 'minor'));

            $searched_email = "";
            $searched_location_id = "";


            echo("Email =" . $email . "<br />\n");
            echo("Location_id =" . $location_id . "<br />\n");
            echo("Location_name =" . $location_name . "<br />\n");
            echo("UUID =" . $UUID . "<br />\n");
            echo("major =" . $major . "<br />\n");
            echo("minor =" . $minor . "<br />\n");
            echo "<br>";


            $con = db_connect();
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql2 = "SELECT u.Email, l.location_id FROM users u, location l WHERE u.location_id = l.location_id AND u.Email = '$email'";
            $result = db_select($sql2);
            print_r($result);
            echo"<br>";


            if (empty($result)) {
                echo"$email NOT EXISTING...";
                $sql_loc_est = "SELECT * FROM `location` WHERE `location_id` = $location_id";

                $result_loc = db_select($sql_loc_est);
                if (!empty($result_loc)) {
                    echo "<br>But Location $location_id Exists";
                    $sql_in_user = "INSERT INTO `users`(`Email`, `location_id`) VALUES ('$email', $location_id)";
                    $res_in_user = db_query($sql_in_user);
                    echo "$res_in_user";
                    print_r($res_in_user);
                } else {
                    echo "<br>Location does not exist either";

                    $sql_start_transaction = "START TRANSACTION";
                    $sql_in_us_lo = "
              INSERT
              INTO
              location(
              UUID,
              location_id,
              location_name,
              major,
              minor
              )
              VALUES(
              '$UUID',
              $location_id,
              '$location_name',
              $major,
              $minor
              )";
                    $sql_in_us_lo_2 = "
              INSERT
              INTO
              users(`Email`,
              `location_id`)
              VALUES('$email', $location_id)";
                    $sql_commit = "COMMIT;";
                    db_query($sql_start_transaction);
                    $res_un_us_lo = db_query($sql_in_us_lo);
                    db_query($sql_in_us_lo_2);
                    db_query($sql_commit);
                    //-------------------------------------//
                    if (!$res_un_us_lo) {
                        echo"Didnt work...";
                    }
                    print_r($res_un_us_lo);
                }
            } else if (!empty($result)) {
                echo "kalle already exist";
                foreach ($result as $value) {
                    $searched_email = $value['Email'];
                    $searched_location_id = $value['location_id'];
                    echo "<br>";
                    echo 'Id: ' . $value['Email'];
                    echo '<br>Location id: ' . $value['location_id'];
                    echo "<br>";
                }
                if ($searched_email == $email && $searched_location_id == $location_id) {
                    //Email and Location id matches input so nothing happens.
                    echo "Email och Location ID var samma!";
                } else {
                    //Email and location doesnt match with database
                    echo "Email och location ID var INTE samma!";
                    $sql_loc_est = "SELECT * FROM `location` WHERE `location_id` = $location_id";

                    $result_loc = db_select($sql_loc_est);
                    if (!empty($result_loc)) {
                        //If both user and location exists but no same as inputed
                        echo "<br>But Location $location_id Exists";
                        $sql_update_us_loc = "UPDATE `users` SET`location_id`=$location_id WHERE `Email` = '$email'";
                        $res_upd = db_query($sql_update_us_loc);
                        if ($res_upd) {
                            echo"Uppdatering lyckades";
                            print_r($res_upd);
                        }
                        print_r($result_loc);
                    } else {
                        // IF user exist but location dont
                        echo "<br>Location does not exist either";
                        $sql_start_transaction = "START TRANSACTION";
                        $sql_in_us_lo = "
              INSERT
              INTO
              location(
              UUID,
              location_id,
              location_name,
              major,
              minor
              )
              VALUES(
              '$UUID',
              $location_id,
              '$location_name',
              $major,
              $minor
              );";
                        $sql_update_us = "UPDATE `users` SET `location_id`=$location_id,`time_stamp`= now WHERE `Email`='$email';";
                        $sql_commit = "COMMIT;";
                        //---- Executes sql query
                        db_query($sql_start_transaction);
                        db_query($sql_in_us_lo);
                        db_query($sql_update_us);
                        db_query($sql_commit);

                        print_r($result_loc);
                    }
                }
            }

            mysqli_close($con);
        }
        ?>
    </body>
</html>
