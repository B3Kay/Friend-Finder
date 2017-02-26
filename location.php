<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Friend Monitor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="" > 

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.yellow-pink.min.css" />
        <link rel="stylesheet" href="fm_css.css" />
        <link rel="stylesheet" href="location.css" />


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <script type="text/javascript" src="fm.js"></script>

        <!-- timeago.yarp.com-->
        <script src="jquery.timeago.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- Uses a header that scrolls with the text, rather than staying
  locked at the top -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header ">
                <!-- Top row, always visible -->
                <div class="mdl-layout__header-row ">
                    <!-- Title -->
                    <span class="mdl-layout-title">Friend Monitor</span>
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                         mdl-textfield--floating-label mdl-textfield--align-right">
                        <label class="mdl-button mdl-js-button mdl-button--icon"
                               for="waterfall-exp">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" name="sample"
                                   id="waterfall-exp">
                        </div>
                    </div>
                </div>
                <!-- Bottom row, not visible on scroll -->

            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Friend Monitor</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="index.php">Friends</a>
                    <a class="mdl-navigation__link" href="">Settings</a>
                    <a class="mdl-navigation__link" href="">Logout</a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content">


                    <!-- Your content goes here -->
                    <div id="map"></div>
                    <?php include 'location_service.php'; ?>
                    




                    

                </div>
                <footer class="mdl-mini-footer">
                    <div class="mdl-mini-footer__left-section">
                        <div class="mdl-logo">Friend Monitor</div>
                        <ul class="mdl-mini-footer__link-list">
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Privacy & Terms</a></li>
                        </ul>
                    </div>
                </footer>
            </main>

        </div>


    </body>
</html>
