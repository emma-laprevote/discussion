<?php
session_start();
    require_once('php/functions.php');
    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', '');

    if(!empty($_SESSION['login'])) {
      $userView = viewAvatar();
    }

    $root_images = "images/";
    $root_index = "index";
    $root_inscription = "pages/inscription";
    $root_connexion = "pages/";
    $root_discussion = "pages/";
    $root_css = 'css/';
    $root_js = 'js/';
?>

<?php $title = 'THE FACTORY'; ?>

<?php ob_start(); ?>

<?php require_once('php/header.php');?>

  <main id="presentFactory">
    
    <aside>
      <section id="liens">
        <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.deviantart.com/" target="_blank"><i class="fab fa-deviantart"></i></a>
      </section>

      <section id="biography">
          <p id="textbio" class="flow-text"><span class="typo">the factory</span><br> est une communauté artistique spécialisée dans 
          le graffiti en ligne, où chacun peut s'inscrire et exposer ses propres créations, 
          graphiques, photographiques, échanger sur les spots, le matériel, la musique et ainsi cottoyer les graffeurs tout autour du globe !</p>
      </section>
      <section id="music">
        <h5>#musique.</h5>
        <div>
            <p><span class="weight" class="flow-text">The Streets</span><br>None of Us Are Getting Out of This Life Alive.</p>
            <img src="images/thestreets.jpg" id="streets" alt="pochette dernier album the streets">
            <p class="p3" class="flow-text">Neuf ans après son dernier album, THE STREETS revient avec Tame Impala sur un enthousiasmant single 
            annonciateur d'une mixtape estivale. L'occasion de réentendre la gouaille de Mike Skinner. </p>
        </div>
        <div>
            <p><span class="weight" class="flow-text">Slowthai</span><br>Nothing great about Britain.</p>
            <img src="images/slowthai.jpeg" id="slow" alt="pochette dernier album Slowthai">
            <p class="p3" class="flow-text">Tout ce que l'Angleterre a fait de plus énervé ces deux dernières années semble s'être passé le mot. 
            Après le retour en grâce ce matin des kids de Shame, voilà que ce sale gosse de slowthai s'invite à la fête et 
            annonce un nouvel album, attendu le 5 février prochain.</p>
        </div>
      </section>
    </aside>

    <section id="present">
        <div id="graffiti">
            <div class="slogan">
            <p class="p1" class="flow-text">LESS ODOR -</p>
            <p class="p2" class="flow-text">MORE</p>
            <p class="p2" class="flow-text">ACTION.</p>
    <?php 
    if(isset($_SESSION['login']) == "") { ?>

    <?php
    } elseif (isset($_SESSION['login']) != "") {

      $user = $_SESSION['login'];

        echo "<div class='membre'>
            <div class='container'>
                <div class='row'>
                    <div id='iconeuser' class='col 5 s6'>
                    <div id='circle'><img id='avat' src='pages/membres/avatar/$userView' alt='avatar utilisateur'></div><p id='textuser' class='#ffffff white-text'>Hello $user!</p>
                    </div>
                <div id='buttonrow'>
                    <a href='pages/profil.php' class='waves-effect N/A transparent #ffffff white-text btn'><i class='material-icons left #ffffff white-text'>face</i>MON COMPTE</a>
                    <a href='pages/discussion.php' class='waves-effect N/A transparent #ffffff white-text btn'><i class='material-icons left #ffffff white-text'>message</i>DISCUSSION</a>
                </div>
                </div>
            </div>
        </div>";
    }
    ?>
    </div>
        </div>

    <article>
        <section id="shop">
            <h5>#chooseyourweaponwisely.</h5>
            <img src="images/logoflame.png" id="logoflame" alt="Logo Flame"><br>
            <img src="images/spray.png" id="spraypaint" alt="Bombe peinture flame">
            <p id="textFlame" class="flow-text">Découvrez la <span class="weight">bombe de peinture Flame Orange</span>, à travers <span class="weight">120 couleurs</span> funky ! 
                Il s'agit de la bombe la plus aboutie au monde dans sa catégorie : Sa valve ultra contrôlable, 
                dévelopée spécialement pour le graffiti est équipée <span class="weight">d'un fat cap d'origine</span>, et permet d'obtenir 
                des lignes de <span class="weight">2 à 30 centimètres</span>, par simple gestion de la pression. La bombe de peinture 
                Flame Orange, vous propose une expérience de peinture rapide, associant le plaisir d'une 
                application couvrante, gérable et résistante au meilleur prix : un pur plaisir !</p>
            <a class="waves-effect #000000 black btn"><i class="material-icons left">flash_on</i>Decouvrir</a>
        </section>

        <section id="art">
            <img src="images/persu.jpg" id="boatgraff" alt="Bateau avec graffiti">
            <h6>Entretien</h6>
            <h2>Persu à la recherche des spots perdus.</h2>
            <p class="flow-text">Partir en roadtrip pour dénicher des spots vierges, faire des graffs, 
                prendre des photos… et croiser des chats. C’est le quotidien de Persu, 
                un graffeur en quête d’aventures qui partage sa passion des lieux abandonnés 
                avec sa compagne, photographe.</p>
            <p class="p4">Rob Zacny le 16.11.20</p>
            <a class="waves-effect #1b5e20 #000000 black btn"><i class="material-icons left">flash_on</i>Lire l'article</a>
        </section>
    </article>

    <section id="gallery">
        <div class="artist">
            <img src="images/artistcorner.png" id="corner" alt="logo artist corner">
        </div>

    <section class="expo">
        <div class="prod1">
            <img src="images/prod1.jpg" id="prod1" alt="tableau graffiti">
            <p class="weight">ROYS32</p>
            <p>Indémodable</p>
            <p class="weight">30,00 €</p>
            <a class="waves-effect #000000 black btn"><i class="material-icons left">flash_on</i>DETAILS</a>
        </div>

        <div class="prod2">
            <img src="images/prod2.jpg" id="prod2" alt="tableau graffiti">
            <p class="weight">EKIEM</p>
            <p>No Mosquito</p>
            <p class="weight">50,00 €</p>
            <a class="waves-effect #000000 black btn"><i class="material-icons left">flash_on</i>DETAILS</a>
        </div>

        <div class="prod3">
            <img src="images/prod3.jpg" id="prod3" alt="tableau graffiti">
            <p class="weight">ANTISTATIK</p>
            <p>The pilot</p>
            <p class="weight">100,00 €</p>
            <a class="waves-effect #000000 black btn"><i class="material-icons left">flash_on</i>DETAILS</a>
        </div>

        <div class="prod4">
            <img src="images/prod4.jpg" id="prod4" alt="tableau graffiti">
            <p class="weight">ANTISTATIK</p>
            <p>Burning Face</p>
            <p class="weight">100,00 €</p>
            <a class="waves-effect #000000 black btn"><i class="material-icons left">flash_on</i>DETAILS</a>
        </div>
      </section>
    </section>
    </section>
  </main>
  <?php require_once('php/footer.php');?>
            
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>    
<script type="text/javascript" src="<?= $root_js ?>materialize.min.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require_once('php/template.php'); ?>
