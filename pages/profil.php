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
    <title>MON COMPTE</title>
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
    
    <div id="joinus3">
        <p class="big2" class="flow-text">HELLO <span class="graffUser">User !</span></p>
        <p class="textJoin2" class="flow-text">Get free access to 370 million pieces of art. Showcase, promote, 
            sell & share your work with over 48 million members.</p>
    </div>

    <div id="formJoin">
        <h4 id="titleJoin3">Change your profile</h4>
        <p class="already">Modifie ton profil quand tu veux et comme tu le veux.</p>

    <form class="col s12" method="POST" action="profil.php">
      <div class="row">
        <div class="file-field input-field">
            <div id="buttonFile" class="btn N/A transparent #000000 black-text">
                <span>File</span>
                <input type="file">
            </div>
            <div class="file-path-wrapper col s10">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="input-field col s11">
          <i class="material-icons prefix">account_circle</i>
          <input id="login" type="text" name="login" class="validate" required>
          <label for="login">Nom d'utilisateur</label>
        </div>
        <div class="input-field col s11">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" name="password" class="validate" required>
          <label for="password">Password</label>
        </div>
        <div class="input-field col s11">
          <i class="material-icons prefix">lock</i>
          <input id="confirm_password" type="password" name="confirm_password" class="validate" required>
          <label for="confirm_password">Conformation password</label>
        </div>
        <button id="buttonStyle" class="btn waves-effect N/A transparent #000000 black-text" type="submit" name="envoyer">Log in
        </button>
      </div>
    </form>
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
<script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>