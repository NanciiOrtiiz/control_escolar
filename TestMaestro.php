<?php

    require('Maestro.php');
    require ('Conexion.php');
    require('header.php');

    $maestro = new Maestro();

    $maestro->showGroups(13);

    require ('footer.php');
?>