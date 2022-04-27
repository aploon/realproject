<?php
require_once(__DIR__ . '/../../../db.php');
require_once(__DIR__ . '/../../../fonctions-sql.php');
require_once(__DIR__ . '/../../../fonctions.php');

$message = '';
$filename1 = '';
$filename2 = '';
$filename3 = '';
$filename4 = '';
$uploadPath = __DIR__ . '/../../../../../assets/upload/document-projet/';

if ($_FILES) {
    if ($_FILES['fichier1']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier1']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx', 'xlsx'))) {
            $filename1 = $_FILES['fichier1']['name'];
            move_uploaded_file($_FILES['fichier1']['tmp_name'], $uploadPath . $filename1);
        }
    }
    if ($_FILES['fichier2']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier2']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx', 'xlsx'))) {
            $filename2 = $_FILES['fichier2']['name'];
            move_uploaded_file($_FILES['fichier2']['tmp_name'], $uploadPath . $filename2);
        }
    }
    if ($_FILES['fichier3']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier3']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx', 'xlsx'))) {
            $filename3 = $_FILES['fichier3']['name'];
            move_uploaded_file($_FILES['fichier3']['tmp_name'], $uploadPath . $filename3);
        }
    }
    if ($_FILES['fichier4']['name'] != '') {

        $infoPath = pathinfo($_FILES['fichier4']['name']);

        if (in_array($infoPath['extension'], array('jpg', 'jpeg', 'gif', 'png', 'docx', 'xlsx'))) {
            $filename4 = $_FILES['fichier4']['name'];
            move_uploaded_file($_FILES['fichier4']['tmp_name'], $uploadPath . $filename4);
        }
    }
}

if (isset($_POST['id_projet_update'])) {

    $id_projet = $_POST['id_projet_update'];
    $nom_projet = $_POST['nom_projet'];
    $description_projet = $_POST['description_projet'];
    $montant_total_projet = $_POST['montant_total_projet'];
    if (isset($_POST['modeContrib'])) {
        $dac_projet = si_funct1(in_array('dac', $_POST['modeContrib']), 'oui', 'non');
        $dsc_projet = si_funct1(in_array('dsc', $_POST['modeContrib']), 'oui', 'non');
        $ps_projet = si_funct1(in_array('ps', $_POST['modeContrib']), 'oui', 'non');
        $pr_projet = si_funct1(in_array('pr', $_POST['modeContrib']), 'oui', 'non');
    }

    if (update('projet', [
        'nom_projet' => $nom_projet,
        'description_projet' => $description_projet,
        'montant_total_projet' => $montant_total_projet,
        'dac_projet' => $dac_projet,
        'dsc_projet' => $dsc_projet,
        'ps_projet' => $ps_projet,
        'pr_projet' => $pr_projet
    ], "id_projet = $id_projet", $db)) {
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
        $message = 'Projet modifié';
    }
}

if (isset($_POST['id_projet_delete'])) {
    $id_projet = $_POST['id_projet_delete'];

    if (update('projet', [
        'etat_projet' => 'delete'
    ], "id_projet = $id_projet", $db)) {
        $message = 'Projet supprimé';
    }
}


echo json_encode($message);
