<?php

class htmlGen extends PDOManagerClass{

    public function __construct(){
        parent::__construct();
    }

    public function display(array $table,string $type = "all", string $condition = null,string $condColonnes = null, array $select = ["*"]){
        if($type == "all"){
            $data = $this->findAll($table);
        }
        
        else if($type == "by"){
            if(isset($condition)){
                $data = $this->findBy($table,$condition);
            }else{
                echo "Erreur";
            }
        }

        else if($type == "relation"){
                $data = $this->getRelation($table,$condition,$condColonnes,$select);            
        }

        echo "<table border='1'>";
        echo "<tr>";
        foreach($data[0] as $key => $value){
            echo "<th>$key</th>";
        }
        echo "</tr>";
        foreach($data as $row){
            echo "<tr>";
            foreach($row as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}