<?php

class LenguajeDato extends Conexion
{
    private $intId;
    private $strNombre;
    private $strLink;

    public function __construct()
    {
        parent::__construct();
        // echo "mensaje desde el modelo home!";
    }
    public function setId(int $id)
    {
        $this->intId = $id;
    }
    public function setNombre(string $nombre)
    {
        $this->strNombre = $nombre;
    }
    public function setLink(string $link)
    {
        $this->strLink = $link;
    }
    public function all()
    {
        $sql = "SELECT * FROM lenguajes";
        $request = $this->select_all($sql);
        return $request;
    }
    public function insertLenguaje()
    {
        try {
            $query_insert = "INSERT INTO lenguajes(nombre, link) VALUES (?,?)";
            $arrData = array($this->strNombre, $this->strLink);
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        } catch (Exception $e) {
            return $return = "exist";
        }
    }
}
