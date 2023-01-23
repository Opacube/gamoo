<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Page Admin</title>
  </head>
  <body>

    <p>Modifier ou supprimer des utilisateurs :</p>
    <?php require_once "php/config.php" ?>
    <?php
      if(!isset($_SESSION['user']) || $_SESSION['user']['admin'] == 0) {
        header('Location: index.php');
        exit();
      }
    ?>


    <div class="">
      <a href="index.php">home</i></a>
    </div>
    <?php
    $sql = "SELECT * FROM user";
    $pre = $pdo->prepare($sql);
    $pre->execute();
    $data = $pre->fetchall(PDO::FETCH_ASSOC);
    foreach ($data as $user => $id_user) {
      echo $id_user['firstname']."\n";
      echo $id_user['name']."\n";
      echo $id_user['admin'] == 1?"Admin":""."\n";
      ?>
      <form class="" action="php\delete.php" method="post">
        <input type="hidden" name="id_user_delete" value="<?php echo $id_user['id_user'];?>">
        <input type="submit" name="Delete" value="Delete">
      </form>
      </br>
      <form class="" action="php\set_admin.php" method="post">
        <input type="hidden" name="id_user_admin" value="<?php echo $id_user['id_user'];?>">
        <input type="hidden" name="admin_state" value="<?php echo $id_user['admin'];?>">
        <input type="submit" name="admin" value="admin">
      </form>
      </br>
      <form class="" action="php\change_firstname.php" method="post">
        <input type="hidden" name="id_user_firstname" value="<?php echo $id_user['id_user'];?>">
        <input type="text" name="firstname" value="<?php echo $id_user['firstname'];?>">
        <input type="submit" name="firstname_sub" value="Ok">
      </form>
      </br>

      </br>
    <?php
    }
    ?>
    <p>Créé un nouveau projet :</p>
    <form action="php\add_project.php" method="post" >
      <input type="text" name="h1" placeholder="Titre">
      <input type="text" name="content" placeholder="Content">
      <input type="file" name="img1" placeholder="Image">
      <input type="submit" name="add" value="Add">
    </form>

    <p>Gérer des projets :</p>
    <?php
    $sql = "SELECT * FROM projet";
    $pre = $pdo->prepare($sql);
    $pre->execute();
    $data = $pre->fetchall(PDO::FETCH_ASSOC);
    foreach ($data as $user => $id_project) {
      

      ?>



      <form class="" action="php\update_project.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_project" value="<?php echo $id_project['id_project'];?>">
        <textarea name="h1"> <?php echo $id_project['h1'] ?></textarea>
        <textarea name="p"> <?php echo $id_project['p'] ?></textarea>


        <img src="<?php echo $id_project['img1'] ?>" width="50px">
        <input type="file" name="img1">


        <button type="submit" name="button">Modifier</button>


      </form>
      <form class="" action="php\delete_project.php" method="post">
        <input type="hidden" name="id_project_delete" value="<?php echo $id_project['id_project'];?>">
        <input type="submit" name="Delete" value="delete">
      </form>
      </br>
    <?php
    }
    ?>



    <p>Gérer la page d'acceuil</p>
    <?php
    $sql = "SELECT * FROM home";
    $pre = $pdo->prepare($sql);
    $pre->execute();
    $data = $pre->fetch(PDO::FETCH_ASSOC);

      ?>
    <form class="" action="php\updatehome_page.php" method="post" enctype="multipart/form-data">
      <textarea name="h1"> <?php echo $data['h1'] ?></textarea>
      <textarea name="h2"> <?php echo $data['h2'] ?></textarea>
      <textarea name="p1"> <?php echo $data['p1'] ?></textarea>
      <textarea name="p2"> <?php echo $data['p2'] ?></textarea>

      <img src="<?php echo $data['img1'] ?>" width="50px">
      <input type="file" name="img1">
      <img src="<?php echo $data['img2'] ?>" width="50px">
      <input type="file" name="img2">

      <button type="submit" name="button">Modifier</button>


    </form>
  </body>
</html>