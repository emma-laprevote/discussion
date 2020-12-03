<footer class="page-footer #bdbdbd grey lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <img src="<?= $root_images ?>logo2.PNG" id="logo2" alt=" logo entreprise the factory">
                <section id="liens2">
                    <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.deviantart.com/" target="_blank"><i class="fab fa-deviantart"></i></a>
                </section>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><a class="black-text darken-4" href="<?= $root_index ?>.php"><i class="material-icons left">flash_on</i>ACCUEIL</a></li>
                  <?php if(isset($_SESSION['login']) == "") { ?>
                  <li><a class="black-text darken-4" href="<?= $root_inscription ?>inscription.php"><i class="material-icons left">flash_on</i>INSCRIPTION</a></li>
                  <li><a class="black-text darken-4" href="<?= $root_connexion ?>connexion.php"><i class="material-icons left">flash_on</i>CONNEXION</a></li>
                  <li><a class="black-text darken-4" href="<?= $root_discussion ?>discussion.php"><i class="material-icons left">flash_on</i>DISCUSSION</a></li>
                  <?php
                  }elseif(isset($_SESSION['login']) != "") { ?>
                  <li><a class="black-text darken-4" href="<?= $root_discussion ?>discussion.php"><i class="material-icons left">flash_on</i>DISCUSSION</a></li>
                  <?php
                  }
                  ?>
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