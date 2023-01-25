
<?php
    require_once "config.php" ;

    $id = 11;

    $sql = "DELETE FROM friend WHERE id_user_1=$id AND id_user_2=:user AND accept=1";
    $pre = $pdo->prepare($sql);
    $pre->bindParam("user",$_POST['id_user_delete']);
    $pre->execute();

    $sql = "DELETE FROM friend WHERE id_user_1=:userand id_user_1=$id AND accept=1";
    $pre = $pdo->prepare($sql);
    $pre->bindParam("user",$_POST['id_user_delete']);
    $pre->execute();

    header('Location:friend.php');
    exit();
?>

