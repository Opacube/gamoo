<?php 
require_once "config.php";

$destination = "upload/".$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"../".$destination);

if(!empty($_POST['email'] && $_POST['username'] && $_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $sql = "SELECT * FROM user WHERE email=:email";
    $dataBinded=array(
    ':email'   => $_POST['email']
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
    $user = $pre->fetch(PDO::FETCH_ASSOC);
    if(empty($user)){
        $sql = "INSERT INTO user(email,username,password,img) VALUES(:email,:username,SHA1(:password),:img)";
        $dataBinded=array(
            ':email'   => $_POST['email'],
            ':username'=> $_POST['username'],
            ':password'=> $_POST['password'],

        );
        $pre = $pdo->prepare($sql);
        $pre->execute($dataBinded);
        if ($dataBinded[':img'] == "upload/"){
            $sql = "UPDATE user SET img='upload/default.jpg' WHERE email='".$_POST['email']."'";
            $pre = $pdo->prepare($sql);
            $pre->execute($dataBinded);
        }
        header("Location:../index.php");
        exit();
        
    }else{
        $_SESSION['errorsignup']="Email already used ! <br> Please try again !";
        header("Location:../index.php");
        exit();
    }
}else{
    $_SESSION['errorsignup']="Every information must be filled ! <br> Please try again !";
    header("Location:../index.php");
    exit();
}



?>