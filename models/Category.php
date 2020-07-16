<?php
//conection database
require "../config/conection.php";
Class Category
{
    //implement construct
    public function __construct()
    {

    }
    //add log
    public function add($name)
    {
        $sql="INSERT INTO category (name,condition)
        VALUES ('$name','1')";
        return runQuery($sql);
    }
    //edit log
    public function edit($idcategory,$name)
    {
        $sql="UPDATE category SET name='$name'
        WHERE idcategory=$idcategory";
        return runQuery($sql);
    }
    //disable category
    public function disable($idcategory)
    {
        $sql="UPDATE category SET condition=0
        WHERE idcategory='$idcategory'";
        return runQuery($sql);
        
    }
    //enable category
    public function enable($idcategory)
    {
        $sql="UPDATE category SET condition=1
        WHERE idcategory='$idcategory'";
        return runQuery($sql);
        
    }
    //show data to modify
    public function show($idcategory)
    {
        $sql="SELECT * FROM category WHERE idcategory='$idcategory'";
        return runQueryonlyRow($sql);
    }
    public function list()
    {
      $sql="SELECT * FROM category" ;
      return runQuery($sql); 
    }
    




}
?>