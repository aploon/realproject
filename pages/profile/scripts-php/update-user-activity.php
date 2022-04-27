<?php require_once(__DIR__ . '/../db.php') ?>

<?php require_once(__DIR__ . '/../fonctions.php') ?>

<?php require_once(__DIR__ . '/../fonctions-sql.php') ?>

<?php

$message = '';

if ($_POST) {
    $d = new DateTime();
    $date = $d->format('Y-m-d H:i:s');

    if ($_POST['action'] == 'update_last_activity') {

        $id_personne = $_SESSION['id_personne'];
        if (update('login_details', [
            'last_activity_login_details' => $date
        ], "id_personne_fk_login_details = $id_personne", $db)) {
            $message = 'Utilisateur en ligne';
        }
    }

    if ($_POST['action'] == 'get_online_statut') {

        $query1 = "SELECT id_personne FROM personnel, personne, login_details WHERE personnel.id_personne_fk_personnel = personne.id_personne AND login_details.id_personne_fk_login_details = personne.id_personne AND last_activity_login_details > DATE_SUB(NOW(),  INTERVAL 5 SECOND)";
        $statement1 = $db->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();

        $online = array();
        foreach ($result1 as $row1) {
            $online[] = $row1['id_personne'];
        }
        $message = $online;
    }
}

echo json_encode($message);
