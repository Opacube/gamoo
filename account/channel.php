<!DOCTYPE HTML>
<html lang='fr'>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/style.css" media="screen,projection" />
</head>

<body class='indigo'>
    <div class='indigo lighten-3 channel' id="channel">
        <?php
        require_once "config.php";



        //Il faut modifier $id par $SESSION_user['id_user']
        $id_de_session = '1';

        $utilisateur = array(
            'id_user' => '2',
            'username' => 'Opacube',
            'email' => 'oue@gmail.com',
            'backupmail' => 'oue2@gmail',
            'password' => 'glaçon',
            'secret_q' => 'Tu habites ou',
            'secret_ans' => 'à Paris',
            'pfp' => '../img/zerotwo.jpeg',
            'bio' => 'youhou',
            'country' => 'France',
            'area' => 'PACA',
            'language' => '1'
        )
        ;
        //Il faut définir cette variable avec un get via l'url
        $id_friend = '2';

        $sql_friend = "SELECT * FROM `user` WHERE id_user=$id_friend";
        $pre = $pdo->prepare($sql_friend);
        $pre->execute();
        $friend = $pre->fetchall(PDO::FETCH_ASSOC);
        $friend = $friend['0'];

        $sql = "SELECT * 
        FROM `message` 
        WHERE id_user_1 = 1 AND id_user_2 = 2 OR id_user_1 = 2 AND id_user_2 = 1
        ORDER BY date DESC
        
        ";
        $pre = $pdo->prepare($sql);
        $pre->execute();
        $data = $pre->fetchall(PDO::FETCH_ASSOC);
        if (isset($data)) { ?>
            <ul class='collection'>
                <?php
                foreach ($data as $user => $message) {
                    if ($message['id_user_1'] === $id_de_session) {
                        //La div s'affiche à droite
                        ?>
                        <li class="collection-item avatar indigo lighten-3 ">
                            <div class="">
                                <img src="<?php echo $utilisateur["pfp"]; ?>" alt="pfp" class="circle">
                                <p class="title black-text">
                                    <?php echo $utilisateur["username"] ?>
                                </p>
                                <p><?php echo $message['text']?></p>
                            </div>
                        </li>
                        <?php
                    } else {
                        //La div s'affiche à gauche
                        ?>
                        <li class="collection-item avatar indigo lighten-3 ">
                            <div class="">
                                <span class="title black-text">
                                    <?php echo $friend["username"] ?>
                                </span>     
                                <img src="<?php echo $friend["pfp"]; ?>" alt="pfp" class="circle">
                                <p><?php echo $message['text']?></p>
                            </div>
                        </li>
                        <?php
                    }
                    ;
                }
                ?>
            </ul>
            <?php
        } else {
            echo 'No messages';
        }
        ;
        ?>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/materialize.min.js"></script>
        <!--Ce script sert à garder la scroll bar en bas pour avoir le dernier message à l'écran-->
        <script>document.getElementById('channel').scrollTop = document.getElementById('channel').scrollHeight;</script>
    </div>
</body>

</html>