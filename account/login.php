<?php 
require_once "config.php"; 

if(!empty($_POST['email'] && $_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
     $sql = "SELECT * FROM user WHERE email=:email AND password=SHA1(:password)";
     $dataBinded=array(
     ':email'   => $_POST['email'],
     ':password'=> $_POST['password']
     );
     $pre = $pdo->prepare($sql);
     $pre->execute($dataBinded);
     $user = $pre->fetch(PDO::FETCH_ASSOC);
     if(empty($user)){
          $_SESSION['errorlogin']="The email or password is incorrect ! <br> Please try again !";
          header("Location:../index.php");
          exit();
     }else{
          $_SESSION['user'] = $user;
          header("Location:../index.php");
     }
}else{
     $_SESSION['errorlogin']="Every information must be filled ! <br> Please try again !";
     header("Location:../index.php");
     exit();
}
?>