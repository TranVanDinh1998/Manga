<?php 
class App {
    protected $directory = "Manga";
    protected $controller = "MangaController";
    // protected $controller = "";
    protected $action = "index";
    protected $params = [];
#
    function __construct()
    {
        $this->preprocess();
        if (file_exists(CONTROLLER.$this->controller.".php")) {
            $ctl = new $this->controller;
            if (method_exists($ctl, $this->action)) {
                call_user_func_array([$ctl, $this->action],$this->params);
            }
        }
    }

    public function preprocess()
    {
        $request = trim($_SERVER["REQUEST_URI"],"/");
        if (!empty($request)) {
            $url = explode("/",$request);
            $temp = ucfirst(strtolower(array_shift($url)));
            $this->directory = $temp;
            $this->controller = isset($temp) ? $temp . "Controller" : "MangaController";
            $this->action = isset($url[0]) ? strtolower(array_shift($url)) : "index";
            $this->params = $url;
        }
    }

}
