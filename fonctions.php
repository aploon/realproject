<?php 

    function connected() {
        if(isset($_SESSION['id_compte'])) {
            return true;
        } else {
            return false;
        }
    }

    function dump($variable){
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }
    
    function si_funct($a, $b, $c, $d){
        if($a == $b)
            return $c;
        else
            return $d;
    }

    function si_funct1($a, $b, $c){
        if($a)
            return $b;
        else
            return $c;
    }

    function user_type() {
        if(isset($_SESSION['type_compte'])){
            if($_SESSION['type_compte'] == 1){
                return 'contributeur';
            }else if($_SESSION['type_compte'] == 2){
                return 'promoteur';
            }
        }
    }

    function select($propriete, $table, $db, $selected = '', $condition = '') : string {

        $query = "SELECT DISTINCT $propriete FROM $table $condition";
        $statement = $db->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        

        $output = '';

        foreach ($result as $row) {
            $attributes = ($selected == $row[$propriete]) ? 'selected' : '';
            $output .= '<option value="'.$row[''.$propriete.''].'" '.$attributes.'>'.$row[''.$propriete.''].'</option>'; 
        }

        return $output;
        
    }

    function select1($propriete, $table, $value, $db, $selected = '', $condition = '') : string {

        $query = "SELECT DISTINCT * FROM $table $condition";
        $statement = $db->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        

        $output = '';

        foreach ($result as $row) {
            $attributes = ($selected == $row[$propriete]) ? 'selected' : '';
            $output .= '<option value="'.$row[''.$value.''].'" '.$attributes.'>'.$row[''.$propriete.''].'</option>'; 
        }

        return $output;
        
    }

    function is_in_database($propriete, $table, $value, $db){
        

        $query = "SELECT $propriete FROM $table WHERE $propriete = :value";
        $statement = $db->prepare($query);
        $statement->bindParam(':value', $value);
        $statement->execute();

        $result = $statement->rowCount();
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
