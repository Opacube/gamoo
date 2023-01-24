<?php require_once "account/config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
    <title>Gamoo</title>
</head>
<body>
    <div class="nav">
        <nav>
            <li><a href=""><i class="material-icons">person</i></a></li>
            <li><a href=""><i class="material-icons">feed</i></a></li>
            <li<a href=""><i class="material-icons">search</i></a></li>
            <li><a href=""><i class="material-icons">chat_bubble</i></a></li>
            <li><a href="/account/friend.php"><i class="material-icons">groups</i></a></li>
            <li><a href=""><i class="material-icons">settings</i></a></li>
        </nav>
    </div>
    <?php
        if(isset($_SESSION['user'])){
            echo 'salut';
        }
        else{
            echo "<a href='account/signupform.php'>Hello</a>";
        }
    ?>
    <div class="midblock">
        
    </div>
</body>
</html>

<script>
        <?php
        if(isset($_SESSION['errorsignup'])){
            echo "
                $(document).ready(function(){
                    $('#signup').modal('open');
                });
            ";
            echo "
            M.toast({html: '".$_SESSION['errorsignup']."', classes: 'rounded red'});
        ";
        unset($_SESSION['errorsignup']);
        }else{
            if(isset($_SESSION['errorlogin'])){
                echo "
                    $(document).ready(function(){
                        $('#login').modal('open');
                    });
                ";
                echo "
                M.toast({html: '".$_SESSION['errorlogin']."', classes: 'rounded red'});
            ";
            unset($_SESSION['errorlogin']);
            }
        }
        ?>
    </script>