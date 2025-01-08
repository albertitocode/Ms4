<?php
$host = "localhost";
$user = "postgres";
$pass = "123456";
$database = "prueba";
$port = "5433";

$conect = pg_connect("host=$host port=$port dbname=$database user=$user password=$pass");

if (!$conect) {
    die("Error de conexión: " . pg_last_error());
}

function getConnect()
{
    global $conect; // Usar la conexión global
    return $conect;
}
function consultar($sql)
{
    $result = pg_query(getConnect(), $sql);
    if (!$result) {
        echo "Error en la consulta: " . pg_last_error(getConnect());
        return false;
    }
    return pg_fetch_all($result); // Devuelve los resultados en forma de array asociativo
}
?>