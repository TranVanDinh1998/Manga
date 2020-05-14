<?php 
    define("ROOT",dirname(__DIR__).DIRECTORY_SEPARATOR);

    define("PUBLICS",ROOT."public".DIRECTORY_SEPARATOR);
    define("CSS",PUBLICS."css".DIRECTORY_SEPARATOR);
    define("JS",PUBLICS."js".DIRECTORY_SEPARATOR);
    define("UPLOADS",PUBLICS."uploads".DIRECTORY_SEPARATOR);

    define("APP",ROOT."App".DIRECTORY_SEPARATOR);
    define("CONFIG",APP."Config".DIRECTORY_SEPARATOR);
    define("MODEL",APP."Model".DIRECTORY_SEPARATOR);
    define("VIEW",APP."View".DIRECTORY_SEPARATOR);
    define("CONTROLLER",APP."Controller".DIRECTORY_SEPARATOR);

    define('CORE', ROOT.'Core'.DIRECTORY_SEPARATOR);
    
    

    $module = [MODEL,VIEW,CONTROLLER,CORE];
    set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$module));
    spl_autoload_register("spl_autoload",false);

    new App;
?>