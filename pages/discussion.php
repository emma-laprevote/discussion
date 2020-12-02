<?php
session_start();
    require_once('../php/functions.php');
    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');

    if(empty($_SESSION['login'])) {
        header('Location: connexion.php');
    }
    $view = $bdd->prepare("SELECT messages.message, messages.date, utilisateurs.login, utilisateurs.avatar FROM messages INNER JOIN utilisateurs WHERE messages.id_utilisateur = utilisateurs.id ORDER BY messages.id LIMIT 0,10");
    $view->execute(array());
    $comment = "";

    if(isset($_POST['envoyer']))
    {
        $comment = addMessage();
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" tpe="text/css" href="../css/discussion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISCUSSION</title>
</head>

<body>
<header>
<nav>
    <div class="nav-wrapper #000000 black">
      <img id="factorylogo" src="../images/factorylogo.png" alt="Logo The factory">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../index.php"><i class="large material-icons">grade</i></a></li>
        <li><a href="inscription.php"><i class="large material-icons">person_add</i></a></li>
        <li><a href="connexion.php"><i class="large material-icons">assignment_ind</i></a></li>
        <li><a href="profil.php"><i class="large material-icons">face</i></a></li>
        <li><a href="discussion.php"><i class="large material-icons">message</i></a></li>
      </ul>
    </div>
  </nav>
  </header>

  <main id="logJoin">
    
    <div id="joinus4">
        <p class="big4" class="flow-text">SHARE<br>AND<br>CREATE<br>NEW<br>RELATIONSHIPS</p>
        <p class="textJoin4" class="flow-text">Get free access to 370 million pieces of art. Showcase, promote, 
            sell & share your work with over 48 million members.</p>
    </div>

    <div id="formJoin2">
        <h4 id="titleJoin4">Discussion</h4>
        <p class="already">Discutez et partagez instantanément.</a></p>

          <?php while($commentView = $view->fetch(PDO::FETCH_ASSOC)) { $avatar = $commentView['avatar']; ?>
            <div class="afficheColumn">
            <div class="chip">
            <img src="membres/avatar/<?php echo $avatar;?>" id="avat2" alt="avatar user">
            <span id="userView"><?php echo $commentView['login'];?></span>a écrit le<span class="weight2"><?php echo $commentView['date']; ?></span>
        </div>
        <div class="message">
        <?php echo nl2br($commentView['message']); ?><br>
        </div>
        </div>  
        <?php
          }
        ?>

    <form id="ins" class="col s12" method="POST" action="discussion.php">
      <div class="row">
        <div class="input-field col s12">
            <textarea id="textarea1" name="message" class="materialize-textarea" data-length="140" onkeyup="javascript:MaxLengthTextarea(this, 140);" required></textarea>
            <label for="textarea1">Message</label>
        </div>
        <div>
            <button id="buttonStyle4" class="btn waves-effect N/A transparent #000000 black-text" type="submit" name="envoyer">Envoyer
            </button>
            <?php if($comment != ""){echo "<p>$comment</p>";}?>
        </div>
      </div>
    </form>
    </div>
    </div>    
  </main>
  
  <footer class="page-footer #bdbdbd grey lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <img src="../images/logo2.PNG" id="logo2" alt=" logo entreprise the factory">
                <section id="liens2">
                    <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.deviantart.com/" target="_blank"><i class="fab fa-deviantart"></i></a>
                </section>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><a class="black-text darken-4" href="index.php"><i class="material-icons left">flash_on</i>ACCUEIL</a></li>
                  <li><a class="black-text darken-4" href="inscription.php"><i class="material-icons left">flash_on</i>INSCRIPTION</a></li>
                  <li><a class="black-text darken-4" href="connexion.php"><i class="material-icons left">flash_on</i>CONNEXION</a></li>
                  <li><a class="black-text darken-4" href="profil.php"><i class="material-icons left">flash_on</i>MON COMPTE</a></li>
                  <li><a class="black-text darken-4" href="discussion.php"><i class="material-icons left">flash_on</i>FORUM</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container #000000 black-text">
            © 2020 Emma Laprevote
            </div>
          </div>
        </footer>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>    
<script type="text/javascript" src="../js/materialize.js"></script>
</body>
</html>