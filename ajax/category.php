<?php
require_once "../models/Category.php";

$category = new Category();

$idcategory = isset($_POST["idcategory"])? cleanString($_POST["idcategory"]):"";
$name = isset($_POST["name"])? cleanString($_POST["name"]):"";

switch ($_GET["op"]){
    case 'add&edit':
        if (empty($idcategory)){
            $answer = $category->add($name);
            echo $answer ? "Categoría registrada" : "Categoría no registrada";
        }
        else {
            $answer = $category->edit($idcategory,$name);
            echo $answer ? "Categoría registrada" : "Categoría no registrada";
        }
    break;
    case 'disable':
        $answer = $category->disable($idcategory);
        echo $answer ? "Categoría desactivada" : "No se pudo desactivar categoría ";

    break;
    case 'enable':
        $answer = $category->enable($idcategory);
        echo $answer ? "Categoría activada" : "No se pudo activar categoría ";

    break;
    case 'show':
        $answer = $category->show($idcategory);
        echo json_encode($answer);

    break;
    case 'list':
        $answer = $category->list();
            $data = Array();
            while ($rec=$answer->fetch_object()){

                $data[]=array(
                    "0"=>$rec->idcategory,
                    "1"=>$rec->name,
                    "2"=>$rec->condition
                );
            }   
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);                

    break;
}
?>