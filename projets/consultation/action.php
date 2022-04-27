<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>

<?php 

$message = '';

if($_POST){
    if(isset($_POST['montant_contribution'])){
        $id_personne = $_SESSION['id_personne'];
        $query = "SELECT id_contributeur FROM contributeur, personne WHERE contributeur.id_personne_fk_contributeur = personne.id_personne AND id_personne = $id_personne AND statut_contributeur = 'Actif' ";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();

        $id_projet = $_POST['id_projet'];
        $id_contributeur = $result['id_contributeur'];
        $montant_contribution = $_POST['montant_contribution'];
        $mode_contribution = $_POST['mode_contribution'];

        $query1 = "SELECT montant_collecte_projet  FROM projet WHERE id_projet = $id_projet";
        $statement1 = $db->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetch();

        $montant_collecte_projet = $result1['montant_collecte_projet'] + $montant_contribution;


        if(insert('assoc_projet_and_contributeur', [
            'id_assoc_projet_and_contributeur' => NULL,
            'mode_contribution_assoc_projet_and_contributeur' => $mode_contribution, 
            'montant_assoc_projet_and_contributeur' => $montant_contribution,
            'id_contributeur_fk_assoc_projet_and_contributeur' => $id_contributeur,
            'id_projet_fk_assoc_projet_and_contributeur' => $id_projet,
        ], $db) &&

        update('projet',[
            'montant_collecte_projet' => $montant_collecte_projet
        ], "id_projet = $id_projet", $db)
        
        ){
            $message = 'Contribution éffectuée';
        }else{
            $message = 'Contribution non éffectuée';
        }
    }
}

echo json_encode($message);

?>