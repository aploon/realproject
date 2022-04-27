<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>

<?php

$message = '';
$filename1 = '';
$filename2 = '';
$filename3 = '';
$filename4 = '';
$uploadPath = __DIR__ . '/../../assets/upload/document-projet/';

if ($_FILES) {
    if ($_FILES['fichier1']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier1']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx'))) {
            $filename1 = $_FILES['fichier1']['name'];
            move_uploaded_file($_FILES['fichier1']['tmp_name'], $uploadPath . $filename1);
        }
    }
    if ($_FILES['fichier2']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier2']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx'))) {
            $filename2 = $_FILES['fichier2']['name'];
            move_uploaded_file($_FILES['fichier2']['tmp_name'], $uploadPath . $filename2);
        }
    }
    if ($_FILES['fichier3']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier3']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx'))) {
            $filename3 = $_FILES['fichier3']['name'];
            move_uploaded_file($_FILES['fichier3']['tmp_name'], $uploadPath . $filename3);
        }
    }
    if ($_FILES['fichier4']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier4']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx'))) {
            $filename4 = $_FILES['fichier4']['name'];
            move_uploaded_file($_FILES['fichier4']['tmp_name'], $uploadPath . $filename4);
        }
    }
}

if ($_POST) {

    $id_projet = NULL;
    $nom_projet = $_POST['nom_projet'];
    $montant_total_projet = $_POST['montant_total_projet'];
    $montant_collecte_projet = 0;
    $description_projet = $_POST['description_projet'];
    // $article_projet = addslashes($_POST['article_projet']);
    $etat_projet = 'en_attente';
    if (isset($_POST['modeContrib'])) {
        $dac_projet = si_funct1(in_array('dac', $_POST['modeContrib']), 'oui', 'non');
        $dsc_projet = si_funct1(in_array('dsc', $_POST['modeContrib']), 'oui', 'non');
        $ps_projet = si_funct1(in_array('ps', $_POST['modeContrib']), 'oui', 'non');
        $pr_projet = si_funct1(in_array('pr', $_POST['modeContrib']), 'oui', 'non');
    }
    $info_projet = '';
    // $presentation_promoteur_projet = addslashes($_POST['presentation_promoteur_projet']);
    $min_contribution_projet = 1000;
    $date_contribution_projet = '0000.00.00';
    $d = new DateTime();
    $date_soumission_projet = $d->format('Y-m-d H:i:s');
    $date_publication_projet = '0000.00.00 00:00:00';
    $date_rejet_projet = '0000.00.00 00:00:00';
    $date_fin_projet = '0000.00.00 00:00:00';
    $date_finalisation_projet = '0000.00.00 00:00:00';
    $en_attente_reponse_projet = 'non';

    $id_personne = $_SESSION['id_personne'];
    $query = "SELECT id_promoteur FROM promoteur, personne WHERE promoteur.id_personne_fk_promoteur = personne.id_personne AND id_personne = $id_personne";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetch();

    $id_promoteur_fk_projet = $result['id_promoteur'];
    $id_secteur_fk_projet = 1; //$_POST['id_secteur'];



    if (insert('projet', array(

        'id_projet' => NULL,
        'nom_projet' => $nom_projet,
        'montant_total_projet' => $montant_total_projet,
        'montant_collecte_projet' => $montant_collecte_projet,
        'description_projet' => $description_projet,
        'etat_projet' => $etat_projet,
        'dac_projet' => $dac_projet,
        'dsc_projet' => $dsc_projet,
        'ps_projet' => $ps_projet,
        'pr_projet' => $pr_projet,
        'info_projet' => $info_projet,
        'min_contribution_projet' => $min_contribution_projet,
        'date_soumission_projet' => $date_soumission_projet,
        'date_publication_projet' => $date_publication_projet,
        'date_rejet_projet' => $date_rejet_projet,
        'date_fin_projet' => $date_fin_projet,
        'date_finalisation_projet' => $date_finalisation_projet,
        'en_attente_reponse_projet' => $en_attente_reponse_projet,
        'id_promoteur_fk_projet' => $id_promoteur_fk_projet,
        'id_secteur_fk_projet' => $id_secteur_fk_projet

    ), $db)) {
        $query1 = "SELECT id_projet FROM projet WHERE nom_projet = '$nom_projet'";
        $statement1 = $db->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetch();

        $id_projet = $result1['id_projet'];

        if ($filename1 != '') {
            insert('document', array(
                'id_document' => NULL,
                'nom_document' => addslashes($filename1),
                'id_projet_fk_document' => $id_projet
    
            ), $db);
        }
        if ($filename2 != '') {
            insert('document', array(
                'id_document' => NULL,
                'nom_document' => addslashes($filename2),
                'id_projet_fk_document' => $id_projet
    
            ), $db);
        }
        if ($filename3 != '') {
            insert('document', array(
                'id_document' => NULL,
                'nom_document' => addslashes($filename3),
                'id_projet_fk_document' => $id_projet
    
            ), $db);
        }
        if ($filename4 != '') {
            insert('document', array(
                'id_document' => NULL,
                'nom_document' => addslashes($filename4),
                'id_projet_fk_document' => $id_projet
    
            ), $db);
        }
        $message = 'Projet soumit';
    } else {
        $message = 'Projet non soumit';
    }
}


echo json_encode($message);
?>