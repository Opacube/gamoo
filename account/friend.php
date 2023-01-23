<?php 
    require_once "config.php";

    $id = 1;

    $sql = "SELECT u.username FROM `friend` 
            INNER JOIN `user`u
            ON friend.id_user_2 = u.id_user
            WHERE id_user_1 = $id 
            ORDER BY u.username";
    $pre = $pdo->prepare($sql);
    $pre->execute();
    $data = $pre->fetchall(PDO::FETCH_ASSOC);
    if(isset($data)){
        foreach ($data as $user => $friend){
            ?><div class="friend"><?php echo $friend["username"]."\n" ?></div><?php ;
        }
    } else {
        echo 'No friend';
    };
?>
