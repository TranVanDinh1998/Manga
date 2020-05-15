<?php 
    class MangaController extends Controller {
        public function index(){
            $this->view("Main_Page".DIRECTORY_SEPARATOR."index.php");
            $this->view->render();
        }
    }
?>