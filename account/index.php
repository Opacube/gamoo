<?php
require_once "cfg/config.php";
?>

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