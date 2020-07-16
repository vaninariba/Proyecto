<?php
require_once "global.php";


$conection = new mysqli (DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query ($conection, 'SETNAMES"'.DB_ENCODE.'"');

//Si tenemos un error en la conexion lo mostramos
if (mysqli_connect_errno())
{
    printf("Falló conexión a la base de datos: %s\n",mysqli_connect_errno());
    exit();
}

if (!function_exists('runQuery'))
{
    function runQuery($sql)
    {
        global $conection;
        $query = $conection->query($sql);
        return $query;
    }

    function runQueryonlyRow($sql)
    {
        global $conection;
        $query = $conection->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function runQuery_retornID($sql)
    {
        global $conection;
        $query = $conection->query($sql);
        return $conection->insert_id;
    }

    function cleanString($str)
    {
        global $conection;
        $str = mysqli_real_escape_string($conection,trim($str));
        return htmlspecialchars($str);
    }
}
?>