<?php

class Home
{
    public function __construct()
    {
    }
    public function home($params)
    {
        $data["page_title"] = "Pagina principal";
        // dep($data);
        $this->getVista("Home/homes", $data);
    }
    public function getVista($vista, $data)
    {
        $view = VIEWS  . $vista . ".php";
        // echo $view;
        require_once($view);
    }
}
