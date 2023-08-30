<?php

// spl_autoload_register carga automaticamente un registro
spl_autoload_register(function($class){
        //si existe una clase en libraries/Core
        if(file_exists("Config/App/".$class.".php")){
            //ejemplo     Libraries/Core/home.php
            require_once ("Config/App/".$class.".php");
            
        }

});