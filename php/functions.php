<?php

function insertInscription () {

    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');
    $msg = "";

    if($_POST['password'] == $_POST['confirm_password']) {

        $login = $_POST['login'];
        $pass = $_POST['password'];
        $confpass = $_POST['confirm_password'];

        $login = htmlspecialchars(trim($login));
        $pass = htmlspecialchars(trim($pass));
        $confpass = htmlspecialchars(trim($confpass));

        $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
        $count->execute(array($login));
        $req  = $count->fetch(PDO::FETCH_ASSOC);

        if($req['nbr'] == 0 && !empty($login) && !empty($pass) && !empty($confpass)) {

            $cryptedpass = password_hash($pass, PASSWORD_BCRYPT);//Cryptage du mot de passe 
        
            //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
            $request = $bdd->prepare('INSERT INTO utilisateurs (login, password) VALUES(:login, :password)');
            $request->bindValue(':login', $login, PDO::PARAM_STR);
            $request->bindValue(':password', $cryptedpass, PDO::PARAM_STR);
            $request->execute()or die(print_r($request->errorInfo()));

            header('Location: ../pages/connexion.php');
        }
    
        elseif ($req['nbr'] == 1) {

            $msg = "* Ce nom d'utilisateur est déjà utilisé";
        } 

    } else {

            $msg = "* Les mots de passe sont différents";
        }

    return($msg);
}

function connectLogin () {

    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');
    $msg = "";

    $login = $_POST['login']; 
    $pass = $_POST['password'];

        $login = htmlspecialchars(trim($login));
        $pass = htmlspecialchars(trim($pass));

        $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
        $count->execute(array($login));
        $req  = $count->fetch(PDO::FETCH_ASSOC);  

        if($req['nbr'] == 1) {

            $validPass = $bdd->prepare("SELECT password FROM utilisateurs WHERE login='$login'");
            $validPass->execute();
            $result = $validPass->fetch(PDO::FETCH_OBJ);

            $cryptedpass = $result->password;

            $checkPass = password_verify($pass, $cryptedpass);

            if($checkPass == true ) {

                $validPass = $bdd->prepare("SELECT id, login FROM utilisateurs WHERE login='$login'");
                $validPass->execute();
                $get = $validPass->fetch(PDO::FETCH_OBJ);

                $_SESSION['login'] = $get->login;
                $_SESSION['id'] = $get->id;

              header('Location: ../index.php');
            }
            else
            {
                $msg = "* Le nom d'utilisateur ou le mot de passe est incorrect";
            }
        } else {

            $msg = " * Nom d'utilisateur ou mot de passe incorrecte";
        }

        return($msg);
}

function changeUser () {

    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');
    $msg = "";

        if($_POST['password'] == $_POST['confirm_password']) {

            $login = $_POST['login'];
            $pass = $_POST['password'];
            $confpass = $_POST['confirm_password'];
    
            $login = htmlspecialchars(trim($login));
            $pass = htmlspecialchars(trim($pass));
            $confpass = htmlspecialchars(trim($confpass));
    
            $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
            $count->execute(array($login));
            $req  = $count->fetch(PDO::FETCH_ASSOC);
    
            if($req['nbr'] == 0 && !empty($login) && !empty($pass) && !empty($confpass)) {
    
                $cryptedpass = password_hash($pass, PASSWORD_BCRYPT);//Cryptage du mot de passe 
            
                //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
                $sth = $bdd->prepare('UPDATE utilisateurs SET login= :login, password= :password WHERE login = "'.$_SESSION['login'].'" ');
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->bindValue(':password', $cryptedpass, PDO::PARAM_STR);
                $sth->execute()or die(print_r($sth->errorInfo()));;
               
                header('Location: ../pages/connexion.php');
            }
        
            elseif ($req['nbr'] == 1) {
    
                $msg = "* Ce nom d'utilisateur est déjà utilisé";
            } 
    
        } else {
    
                $msg = "* Les mots de passe sont différents";
            }
    
        return($msg);

}

function avatar () {

    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');
    $msg = "";

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

    if($_FILES['avatar']['size'] <= $tailleMax) {

       $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

       if(in_array($extensionUpload, $extensionsValides)) {

          $chemin = "membres/avatar/".$_SESSION['id'].".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

          if($resultat) {

             $updateavatar = $bdd->prepare('UPDATE utilisateurs SET avatar = :avatar WHERE id = :id');
             $updateavatar->execute(array(
                'avatar' => $_SESSION['id'].".".$extensionUpload,
                'id' => $_SESSION['id']
                ));
             header('Location:  ../pages/connexion.php');

          } else {
             $msg = "Erreur durant l'importation de votre photo de profil";
          }
       } else {
          $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
       }
    } else {
       $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
    }

    return $msg;
 }

}

function viewAvatar () {

    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');
    $avatarUser = "";

    $request = $bdd->prepare("SELECT avatar FROM utilisateurs where login = '".$_SESSION['login']."' ");
    $request->execute(array());
    $result = $request->fetch(PDO::FETCH_ASSOC);

    $avatarUser = $result['avatar'];

    return $avatarUser;
}

function addMessage () {

    $bdd = new PDO('mysql:dbname=discussion;host=localhost', 'root', 'root');
    $msg = "";
    $id = $_SESSION['id'];

    if (!empty($_POST['message'])) {

    $date = date('Y/m/d H:i:s');
    $comment = htmlspecialchars($_POST['message']);

    $message = $bdd->prepare('INSERT INTO messages (message, id_utilisateur, date) VALUES(:message, :id_utilisateur, :date)');
    $message->bindValue(':message', $comment, PDO::PARAM_STR);
    $message->bindValue(':id_utilisateur', $id, PDO::PARAM_INT);
    $message->bindValue(':date', $date, PDO::PARAM_STR);
    $message->execute()or die(print_r($message->errorInfo()));

    header('Location: ../pages/discussion.php');
    $msg = "Votre message a bien été enregistré.";

    }
    
    return $msg;
}