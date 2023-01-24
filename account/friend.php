<html>
    <body>
        <div margin="50px" justify-content="center">
        <?php
            require_once "config.php";
            require_once "setup.php";




            //Il faut modifier $id par $SESSION_user['id_user']
            $id = 1;


            $sql = "SELECT u.username, u.pfp, u.id_user, u.bio, u.country, u.area FROM `friend`
                    INNER JOIN `user` u
                    ON friend.id_user_2 = u.id_user
                    WHERE id_user_1 = $id and accept = 1
                    ORDER BY u.username";  
            $pre = $pdo->prepare($sql);
            $pre->execute();
            $data = $pre->fetchall(PDO::FETCH_ASSOC);
            if(isset($data)){
                ?><ul class='collection'><?php
                foreach ($data as $user => $friend){
                    ?><li class="collection-item avatar indigo lighten-3">
                        <a class="modal-trigger" href="<?php echo "#modal".$friend["id_user"]?>"><img src="<?php echo $friend["pfp"] ?>" alt="pfp" class="circle"></a>
                        <span class="title"><?php echo $friend["username"]?></span>
                        <a href="message/<?php echo $friend["username"].$friend["id_user"]?>" class="secondary-content"><i class="material-icons">chat</i></a>
                    </li>
                    <!-- Modal qui affiche le profil de l'utilisateur choisi -->
                        <div id="<?php echo "modal".$friend["id_user"]?>" class="modal indigo lighten-3">
                            <div class="modal-content">
                                <h4><?php echo $friend["username"] ?></h4>
                                <p><?php echo $friend["bio"]?></p>
                            </div>
                            <div class="modal-footer">
                                <!--Pour delete un ami, l'action du form va vers le fichier php qui fait une requete delete-->
                                <form action="delete_friend.php">
                                    <input type="hidden" name="id_user" value="<?php echo $friend["id_user"] ?>"></input>
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