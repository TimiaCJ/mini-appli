<?php
    $users = $users;
?>
<section class="posts" >
    <h3 class="posts-title">Confirmation de connection</h3>
    <?php
        if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['pass']))
        {
            if (!$users OR !password_verify($_POST['pass'], $users['password']))
            {
                echo '<div class="alert alert-danger">Identifiant ou mot de passe incorrecte</div>';
                echo '<button type="button" class="btn btn-dark"><a class="nav-link active navigation__link" href="'. $this->baseUrl .'">Retour à l\'accueil</a></button>';
            }
            else
            {
                echo  '<div class="alert alert-success">Vous êtes maintenant connecté ' . $users['firstname'] . '</div>';
            }
        }
    ?>
</section>