<?php require_once("../account/config.php");
if(isset($_POST['search'])){
    $friendName = $_POST['search'];
    $sql = "SELECT `id` FROM `user` WHERE `username` LIKE :friendName";
    $pre = $pdo->prepare($sql);
    $pre->bindParam("friendName", $friendName);
    $pre->execute();
    $friend = $pre->fetchAll(PDO::FETCH_ASSOC);

    $user = $_SESSION['user'];

    $sql = "SELECT * FROM friend WHERE id_user_1 LIKE :id_user_1 AND id_user_2 LIKE :id_user_2";
    $pre = $pdo->prepare($sql);
    $pre->bindParam("id_user_1", $user['id']);
    $pre->bindParam("id_user_2", $friend[0]['id']);
    $pre->execute();
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);
    if(empty($result)){ 
        $sql = "SELECT * FROM friend WHERE id_user_1 LIKE :id_user_1 AND id_user_2 LIKE :id_user_2";
        $pre = $pdo->prepare($sql);
        $pre->bindParam("id_user_2", $user['id']);
        $pre->bindParam("id_user_1", $friend[0]['id']);
        $pre->execute();
        $result2 = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result2)){
            $sql = "INSERT INTO friend (id_user_1, id_user_2, accept) VALUES (:id_user_1,:id_user_2,0)";
            $pre = $pdo->prepare($sql); 
            $pre->bindParam("id_user_1", $user['id']);
            $pre->bindParam("id_user_2", $friend[0]['id']);
            $pre->execute();
            echo("Sending friend request from ".$user['id']." to ".$friend[0]['id']);
        } else {
            echo("This user already sent you a friend request");
        }
    } else {
        echo("You've already sent a friend request to that user");
    };
    
};
?>
<html>
    <head>
        <Title>Sending friend request</Title>
    </head>
    <body>
        <?php //echo(var_dump($user))?><p>
    </body>
</html>