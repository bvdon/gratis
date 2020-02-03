<?php

spl_autoload_register(function($className)
{
    $path = 'app/';
    $classMVC = ['controllers/','core/','db/','models/','views/'];
    $ext  = '.php';

    foreach ($classMVC as $thisClass) {
        $fullPath = $path.$thisClass.$className.$ext;
        if (file_exists($fullPath)) {
            require_once $fullPath;
            //echo "require_once: ".$fullPath."<BR>";
        }
    }
});

