<header>
<nav>
    <div class="nav-wrapper #000000 black">
      <img id="factorylogo" src="<?= $root_images ?>factorylogo.png" alt="Logo The factory">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if(isset($_SESSION['login']) == "") { ?>

      <?php
      } else { ?>
        <li><form  method="POST" action="<?= $root_index ?>.php">
        <button id="buttonStyle2" class="btn waves-effect N/A transparent white-text btn" type="submit" name="deconnect">Déconnexion
        </button></form></li>
      <?php
      }
      if(isset($_POST['deconnect'])) {
          session_destroy();
          header("Location: $root_index".".php");
      }
      ?>
        <li><a href="<?= $root_index ?>.php"><i class="large material-icons">grade</i></a></li>
        <?php if(isset($_SESSION['login']) == "") { ?>
        <li><a href="<?= $root_inscription ?>.php"><i class="large material-icons">person_add</i></a></li>
        <li><a href="<?= $root_connexion ?>connexion.php"><i class="large material-icons">assignment_ind</i></a></li>
        <?php
        }else {

        }
        ?>
        <li><a href="<?= $root_discussion ?>discussion.php"><i class="large material-icons">message</i></a></li>
      </ul>
    </div>
  </nav>
  </header>