<?php
session_start();
    require_once('../php/functions.php');
    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', '');

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
    $root_images = "../images/";
    $root_index = "../index";
    $root_inscription = "inscription";
    $root_connexion = "";
    $root_discussion = "";
    $root_css = '../css/';
    $root_js = '../js/';
  ?>
<?php $title = 'DISCUSSION'; ?>
<?php ob_start(); ?>
<?php require_once('../php/header.php');?>

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
  <?php require_once('../php/footer.php');?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>    
<script type="text/javascript" src="<?= $root_js ?>materialize.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require_once('../php/template.php'); ?>