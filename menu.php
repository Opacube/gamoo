<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link id="link-theme" rel="stylesheet" href="css/yellow.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Students' Projects</title>
</head>
<body class="background " id="body">

<!-- NAV -->
    <div class="navbar-fixed">
        <nav class="main z-depth-0">
            <div class="nav-wrapper textcolor z-depth-4">
                <div class="container">
                <a href="index.php" class="brand-logo center"><i class="material-icons">home</i></a>
                <ul id="nav-mobile" class="left-align hide-on-med-and-down">
                    <li><a href="index.php" class="Home">Home</a></li>
                    <li><a class="dropdown-trigger" href="#projectdrop">Projects<i class="material-icons arrowdrp">arrow_drop_down</i></a></li>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo "<li class='usr'><a class='dropdown-trigger waves-effect waves-light btn contact' href='#!' data-target='dropdown1'><img class='pfp left' src=".$_SESSION['user']['img'].">".$_SESSION['user']['username']."</a></li>";    
                            echo "<li class='usr'><a class='waves-effect waves-light btn contact' href='page.php'>Projects</a></li>";
                        }
                        else{
                            echo "<li class='usr'><a class='dropdown-trigger waves-effect waves-light btn contact' href='#!' data-target='dropdown1'><i class='material-icons'>account_circle</i></a></li>";
                        }
                    ?>
                </ul>

                <!-- DROPDOWN -->
                <ul id="dropdown1" class="dropdown-content yellow darken-2">
                <?php
                        if(isset($_SESSION['user'])){
                            echo "<li class='pad'><a class='waves-effect waves-light btn modal-trigger contact menus' href='online/logout.php'>Log Out</a></li>";
                            echo "<li class='pad'><a class='waves-effect waves-light btn modal-trigger contact menus' href='#add_project'>Add project</a></li>";
                            echo "<li class='pad'><a class='waves-effect waves-light btn modal-trigger contact menus' href='profile.php'>Profile</a></li>";
                            if($_SESSION['user']['admin']){
                                echo "<li class='pad'><a class='waves-effect waves-light btn modal-trigger contact menus' href='admin/admin.php'>Admin panel</a></li>";
                            }
                        }else{
                            echo "<li class='pad'><a class='waves-effect waves-light btn modal-trigger contact menus' href='#signup'>Sign Up</a></li>";
                            echo "<li class='pad'><a class='waves-effect waves-light btn modal-trigger contact menus' href='#login'>Log In</a></li>";
                        }
                    ?>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
            </div>
        </nav>
    </div>
        <ul id="slide-out" class="sidenav textcolor">
            <li>
            <div class="user-view">
                <div>
                <a href="index.php" class="brand-logo center"><i class="medium material-icons">home</i></a>
                </div>
            </div>
            </li>
            <li><a href="index.php" class="Home">Home</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Projects<i class="material-icons arrowdrp">arrow_drop_down</i></a></li>
            <li><a class="waves-effect waves-light btn modal-trigger contact" href="#signup">Sign Up</a></li>
            <li><a class="waves-effect waves-light btn modal-trigger contact" href="#login">Log In</a></li>

        </ul>

        <ul id="dropdown2" class="dropdown-content">
            <li><a href="page1.php" class="center">Website Noah</a></li>
            <li class="divider"></li>
            <li><a href="page2.php" class="center">Website Esteban</a></li>
            <li class="divider"></li>
            <li><a href="page3.php" class="center">Drawings Esteban</a></li>
        </ul>

    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
     
</body>
</html>


<?php 
require "online/signupform.php";
require "online/loginform.php"; 
require "project/add_projectform.php";
require "projectdrop.php";
?>