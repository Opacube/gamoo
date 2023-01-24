<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    </head>
    <body>
        
        <?php
            require_once "config.php";

        

            //Il faut modifier $id par $SESSION_user['id_user']
            $id = 1;


            $sql = "SELECT u.username, u.pfp, u.id_user, u.bio, u.country, u.area FROM `friend`
                    INNER JOIN `user` u
                    ON friend.id_user_2 = u.id_user
                    WHERE id_user_1 = $id or id_user_2 = $id and accept = 1
                    ORDER BY u.username";  
            $pre = $pdo->prepare($sql);
            $pre->execute();
            $data = $pre->fetchall(PDO::FETCH_ASSOC);
            if(isset($data)){
                ?><ul class='collection'><?php
                foreach ($data as $user => $friend){
                    ?><a class="modal-trigger" href="<?php echo "#modal".$friend["id_user"]; ?>">
                        <li class="collection-item avatar indigo lighten-3 ">
                            <img src="<?php echo $friend["pfp"]; ?>" alt="pfp" class="circle">
                            <span class="title black-text"><?php echo $friend["username"]?></span>
                            <a href="message/<?php echo $friend["username"].$friend["id_user"];?>" class="secondary-content"><i class="material-icons">chat</i></a>
                        </li>
                    </a>
                    <!-- Modal qui affiche le profil de l'utilisateur choisi -->
                        <div id="<?php echo "modal".$friend["id_user"]?>" class="modal indigo lighten-3">
                            <div class="modal-content">
                                <div>
                                    <img src="<?php echo $friend["pfp"]; ?>" alt="pfp" class="circle">
                                    <div class="secondary-content black-text"><?php echo $friend["country"].", ".$friend["area"]; ?></div>
                                </div>
                                <div class="">
                                    <h4><?php echo $friend["username"]; ?></h4>
                                    <p><?php echo $friend["bio"]; ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--Pour delete un ami, l'action du form va vers le fichier php qui fait une requete delete-->
                                <form action="delete_friend.php" method="post">
                                    <input type="hidden" name="id_user_delete" value="<?php echo $friend["id_user"]; ?>"></input>
                                    <submit class="modal-close waves-effect waves-green btn-flat">Supprimer</submit>
                                </form>
                            </div>
                        </div>
                    <?php ;
                }
                ?>
                </ul>
                <?php
            } else {
                echo 'No friend';
            };
        ?>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script  src="../js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.modal').modal();
            });
        </script>
    </body>
</html>