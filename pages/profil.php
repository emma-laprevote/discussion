<?php
session_start();
$msg_error = "";
$msg_avatar = "";

  require_once('../php/functions.php');
    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', '');

    if(isset($_POST['envoyer']))
    {
        $msg_error = changeUser();
        $msg_avatar = avatar();
    }
    $root_images = "../images/";
    $root_index = "../index";
    $root_inscription = "inscription";
    $root_connexion = "";
    $root_discussion = "";
    $root_css = '../css/';
    $root_js = '../js/';
?>
<?php $title = 'MON COMPTE'; ?>
<?php ob_start(); ?>
<?php require_once('../php/header.php');?>

  <main id="logJoin">
    
    <div id="joinus3">
      <?php if(isset($_SESSION['login'])) {
        $user = $_SESSION['login'];
        echo "<p class='big2' class='flow-text'>HELLO <span class='graffUser'>$user !</span></p>";
      }
      ?>
        <p class="textJoin2" class="flow-text">Get free access to 370 million pieces of art. Showcase, promote, 
            sell & share your work with over 48 million members.</p>
    </div>

    <div id="formJoin">
        <h4 id="titleJoin3">Change your profile</h4>
        <p class="already">Modifie ton profil quand tu veux et comme tu le veux.</p>

    <form id="ins" class="col s12" method="POST" action="profil.php" enctype="multipart/form-data">
      <div class="row">
        <div class="file-field input-field">
        <div class="btn">
            <span>File</span>
            <input type="file" name="avatar">
        </div>
      <div class="file-path-wrapper">
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
        <?php if($msg_error != ""){echo "<p>$msg_error</p>";}?>
        <?php if($msg_avatar != ""){echo "<p>$msg_avatar</p>";}?>
      </div>
    </form>
    </div>
        
  </main>
  <?php require_once('../php/footer.php');?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>    
<script type="text/javascript" src="<?= $root_js ?>materialize.min.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require_once('../php/template.php'); ?>