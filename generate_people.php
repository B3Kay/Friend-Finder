<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'db.php';
?>
<!-- Two Line List with secondary info and action -->

<div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet">
    <ul class="list" id="people_list">

<?php
$con = db_connect();
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT users.PId, users.Email, users.NickName, users.location_id, users.time_stamp, location.location_name, location.latitude, location.longitude FROM users INNER JOIN location ON users.location_id=location.location_id";
$result = db_select($sql);

foreach ($result as $value) {
    $nickname = $value["NickName"];
    $email = $value["Email"];
    $p_id = $value["PId"];
    $time_stamp = $value["time_stamp"];
    $location_name = $value["location_name"];
    $lng = $value["longitude"];
    $lat = $value["latitude"];
    $name;
    if (strlen($nickname) > 0) {
        
        $name = $nickname;
    } else {
        $toFind = "@";
        $stringA = $email;
        $name = strrev( substr(strchr(strrev($stringA),$toFind),1 ));
        //$name = $email;
    }



    echo"<li id=\"$p_id\" class=\"mdl-list__item mdl-list__item--two-line\">
    <span class=\"mdl-list__item-primary-content\">
        <i class=\"material-icons mdl-list__item-avatar\">person</i>
        <span>$name</span>
        <span class=\"mdl-list__item-sub-title \"><time class=\"timeago\" datetime=\"$time_stamp\">$time_stamp</time></span>
    </span>
    <span class=\"mdl-list__item-secondary-content\">
        <span class=\"mdl-list__item-secondary-info\">$location_name</span>
        <a class=\"mdl-list__item-secondary-action\" href=\"#\"><button id=\"menu$p_id\" class=\"mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--accent\">
                                            <i class=\"material-icons\">more_vert</i>
                                        </button>
                                        
</a>
<ul class=\"mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect\" for=\"menu$p_id\">
  <li class=\"mdl-menu__item find_button\"><a class=\"find_button_link\" href=\"location.php?lng=$lng&lat=$lat\">Find</a></li>
  <li class=\"mdl-menu__item profile_button\">Profile</li>
</ul>
    </span>
 </li>";
}
?>
    </ul>

</div>