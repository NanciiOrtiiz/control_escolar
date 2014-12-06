<?php
session_start();
mysql_connect("localhost", "root", "") or die ("Error en la conexion a la BD"); // Connect to the host
mysql_select_db("practica1") or die ("Error en la conexion a la BD"); // select the database
?>