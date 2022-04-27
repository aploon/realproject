<?php

    function insert($table, $column_value, PDO $db){
        $columns = [];
        $values = [];
        foreach($column_value as $column => $value){
            $columns[] = $column;
            $values[] = "'".$value."'";
        }

        $query = "INSERT INTO ".$table." (".implode(',',$columns).") VALUES (".implode(',',$values).")";
        if($db->query($query))
            return true;
        else
            return false;

    }
    function insert1($table, $column_value, PDO $db){
        $columns = [];
        $values = [];
        foreach($column_value as $column => $value){
            $columns[] = $column;
            $values[] = "'".$value."'";
        }

        $query = "INSERT INTO ".$table." (".implode(',',$columns).") VALUES (".implode(',',$values).")";
        // if($db->query($query))
        //     return true;
        // else
        //     return false;
        return $query;

    }

    function update($table, $column_value, $condition, $db){
        $column_value_normal_for_requete = [];
        foreach($column_value as $column => $value){
            $column_value_normal_for_requete[] = $column." = '".$value."'";
        }
        $query = "UPDATE ".$table." SET ".implode(' , ',$column_value_normal_for_requete)." WHERE ".$condition;
        if($db->query($query))
            return true;
        else
            return false;
    }

    function delete($table, $condition, $db){
        $query = "DELETE FROM ".$table." WHERE ".$condition;
        if($db->query($query))
            return true;
        else
            return false;
    }

    function id_contributeur( PDO $db){
        if(isset($_SESSION['type_compte'])){
            if($_SESSION['type_compte'] == 1){
                $id_personne = $_SESSION['id_personne'];
                $query = "SELECT id_contributeur FROM personne, contributeur WHERE contributeur.id_personne_fk_contributeur = personne.id_personne AND id_personne = $id_personne";
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();
    
                return $result['id_contributeur'];
            }
        }
    }

    function id_promoteur( PDO $db){
        if(isset($_SESSION['type_compte'])){
            if($_SESSION['type_compte'] == 2){
                $id_personne = $_SESSION['id_personne'];
                $query = "SELECT id_promoteur FROM personne, promoteur WHERE promoteur.id_personne_fk_promoteur = personne.id_personne AND id_personne = $id_personne";
                $statement = $db->prepare($query);
                $statement->execute();
                $result = $statement->fetch();
    
                return $result['id_promoteur'];
            }
        }
    }

?>