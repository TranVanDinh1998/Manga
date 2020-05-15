<?php


class Controller
{
    protected $view;

    protected function view($file,$data=[]) {
        $this->view = new View($file, $data);
    }

}