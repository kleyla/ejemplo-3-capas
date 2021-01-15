<?php

class Lenguaje
{
    public function __construct()
    {
        require_once("Negocio/LenguajeNegocio.php");
        $this->lenguajeNegocio = new LenguajeNegocio();
        // echo "Desde la presentacion";
    }
    public function index()
    {
        $data["script"] = "Lenguaje/lenguajes.js";
        $this->getVista("Lenguaje/lenguajes", $data);
    }
    public function getVista($vista, $data = "")
    {
        $view = VIEWS  . $vista . ".php";
        // echo $view;
        require_once($view);
    }
    public function getLenguajes()
    {
        // echo "Desde el metodo";
        $arrData = $this->lenguajeNegocio->getLenguajes();
        // FORMATO JSON
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function setLenguaje()
    {
        $strNombre = strClean($_POST["txtNombre"]);
        $strLink = strClean($_POST["txtLink"]);

        $arrResponse = $this->lenguajeNegocio->setLenguaje($strNombre, $strLink);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
