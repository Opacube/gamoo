<?php
    require_once 'config.php' ;


    if($_POST['text-content'] !== '') {
        $sql = "INSERT INTO `message`(`id_user_1`, `id_user_2`, `text`, `date`) VALUES (:id_user_1,:id_user_2,:content,:date)";
        $dataBinded=array(
          ':id_user_1' => $_POST['id_user_1'],
          ':id_user_2' => $_POST['id_user_2'],
          ':content' => $_POST['text-content'],
          ':date' => date("Y-m-d H:i:s")
        );
        $pre = $pdo->prepare($sql);
        $pre->execute($dataBinded);
    
        header('Location:channel.php');
        exit(); 
    } else {
        header('Location:channel.php');
        exit();
    }

?> 