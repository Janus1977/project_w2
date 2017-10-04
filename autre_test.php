<?php
    require_once 'test_form_zarb.php';
    $list = $modules;
    var_dump($list); // affiche le tableau $modules
    foreach ($list as $l) { // Warning: Invalid argument supplied for foreach()
        echo $l;
    }