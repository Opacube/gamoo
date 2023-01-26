<?php 
require_once("../account/config.php");
if(isset($_POST['query'])){
    $input = $_POST['query'];
    $sql = "SELECT * from user WHERE username LIKE :username";
    $pre = $pdo->prepare($sql); 
    $pre->execute(['username' => '%' . $input . '%']);
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);

    if($result){
        foreach($result as $row){
            echo '<a href="#">' . $row['username'] . '</a>';
        }
    } else {
        echo '<p>No Record</p>';
    }
}?>