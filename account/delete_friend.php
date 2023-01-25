
<?php
    require_once "config.php" ;

    if(!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    } else {

    }

    $id = 1;

    $sql = "DELETE FROM `friend` WHERE id_user_1=$id and id_user_2=:user and accept=1 ";
    $dataBinded=array(
      ':user' => $_POST['id_user_delete']
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);


    header('Location:friend.php');
    exit();
?>

