<?php require_once(__DIR__ . '/../db.php') ?>
<?php require_once(__DIR__ . '/../fonctions.php') ?>
<?php require_once(__DIR__ . '/../fonctions-sql.php') ?>

<?php

$message = '';

if (isset($_POST['role'])) {
    if ($_POST['role'] == 'promoteur') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $date_naiss = $_POST['date'];
        $pays = 'Benin';
        $ville = $_POST['ville'];
        $sexe = $_POST['sexe'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $d = new DateTime();
        $date = $d->format('Y-m-d H:i:s');

        if($password != $confirmPassword){
            $message = 'Erreur de confirmation de mot de passe';
        }
        if (is_in_database('email_personne', 'personne', $email, $db)) {
            $message = 'Email existant';
        } 
        
        if($password == $confirmPassword && !is_in_database('email_personne', 'personne', $email, $db)) {
            insert('personne', array(
                'id_personne' => NULL,
                'nom_personne' => $nom,
                'prenom_personne' => $prenom,
                'img_personne' => 'user-1.png',
                'tel_personne' => $tel,
                'adresse_personne' => $adresse,
                'email_personne' => $email,
                'nationnalite_personne' => $pays,
                'date_naiss_personne' => $date_naiss,
                'sexe_personne' => $sexe
            ), $db);

            $query = "SELECT id_personne FROM personne WHERE email_personne = :email";
            $statement = $db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetch();

            insert('compte', array(
                'id_compte' => NULL,
                'pseudo_compte' => $userName,
                'mdp_compte' => $password,
                'statut_compte' => 'Inactif',
                'id_personne_fk_compte' => $result['id_personne'],
                'id_type_compte_fk_compte' => 2
            ), $db);

            insert('promoteur', array(
                'id_promoteur' => NULL,
                'statut_promoteur' => 'Actif',
                'id_personne_fk_promoteur' => $result['id_personne']
            ), $db);

            insert('login_details', array(
                'id_login_details' => NULL,
                'last_activity_login_details' => $date,
                'id_personne_fk_login_details' => $result['id_personne']
            ), $db);

            $message = 'Donnée insérer';
        }

    } else {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $date_naiss = $_POST['date'];
        $pays = 'Benin';
        $ville = $_POST['ville'];
        $sexe = $_POST['sexe'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $d = new DateTime();
        $date = $d->format('Y-m-d H:i:s');

        if($password != $confirmPassword){
            $message = 'Erreur de confirmation de mot de passe';
        }
        if (is_in_database('email_personne', 'personne', $email, $db)) {
            $message = 'Email existant';
        } 
        
        if($password == $confirmPassword && !is_in_database('email_personne', 'personne', $email, $db)) {
            insert('personne', array(
                'id_personne' => NULL,
                'nom_personne' => $nom,
                'prenom_personne' => $prenom,
                'img_personne' => 'user-1.png',
                'tel_personne' => $tel,
                'adresse_personne' => $adresse,
                'email_personne' => $email,
                'nationnalite_personne' => $pays,
                'ville_personne' => $ville,
                'date_naiss_personne' => $date_naiss,
                'sexe_personne' => $sexe
            ), $db);
            $query = "SELECT id_personne FROM personne WHERE email_personne = :email";
            $statement = $db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetch();

            insert('compte', array(
                'id_compte' => NULL,
                'pseudo_compte' => $userName,
                'mdp_compte' => $password,
                'statut_compte' => 'Inactif',
                'id_personne_fk_compte' => $result['id_personne'],
                'id_type_compte_fk_compte' => 1
            ), $db);

            insert('contributeur', array(
                'id_contributeur' => NULL,
                'statut_contributeur' => 'Actif',
                'id_personne_fk_contributeur' => $result['id_personne']
            ), $db);

            insert('login_details', array(
                'id_login_details' => NULL,
                'last_activity_login_details' => $date,
                'id_personne_fk_login_details' => $result['id_personne']
            ), $db);

            $message = 'Donnée insérer';
        }

    }
}


echo json_encode($message);
?>