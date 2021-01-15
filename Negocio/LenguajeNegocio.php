<?php

class LenguajeNegocio
{
    public function __construct()
    {
        require_once("Dato/LenguajeDato.php");
        $this->lenguajeDato = new LenguajeDato();
        // echo "Desde el negocio";
    }

    public function getLenguajes()
    {
        $arrData = $this->lenguajeDato->all();
        // dep($arrData);
        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]["estado"] == 1) {
                $arrData[$i]["estado"] = 'Activo';
                $arrData[$i]["opciones"] = '<div class="text-center">
                        <button class="btn btn-primary btn-sm" onclick="editLenguaje(' . $arrData[$i]['id_lenguaje'] . ')" title="Editar" ><i class="material-icons">edit</i></i></button>
                        <button class="btn btn-danger btn-sm" onclick="deleteLenguaje(' . $arrData[$i]['id_lenguaje'] . ')" title="Eliminar" ><i class="material-icons">delete</i></button>
                    </div>';
            } else {
                $arrData[$i]["estado"] = 'Inactivo';
                $arrData[$i]["opciones"] = '<div class="text-center">
                        <button class="btn btn-primary btn-sm" onclick="editLenguaje(' . $arrData[$i]['id_lenguaje'] . ')" title="Editar" ><i class="material-icons">edit</i></i></button>
                        <button class="btn btn-warning btn-sm" onclick="enableLenguaje(' . $arrData[$i]['id_lenguaje'] . ')" title="Habilitar" ><i class="material-icons">unlock</i></button>
                    </div>';
            }
        }
        // dep($arrData);
        return $arrData;
    }
    public function setLenguaje(string $strNombre, string $strLink)
    {
        $this->lenguajeDato->setNombre($strNombre);
        $this->lenguajeDato->setLink($strLink);
        // Crear
        $request_lenguaje = $this->lenguajeDato->insertLenguaje();
        $option = 1;
        // echo json_encode($request_lenguaje);
        // dep($_POST);
        if ($request_lenguaje === "exist") {
            $arrResponse = array('status' => false, 'msg' => "Atencion! El lenguaje ya existe");
        } else if ($request_lenguaje > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => "Datos guardados correctamente");
            } else {
                $arrResponse = array('status' => true, 'msg' => "Datos actualizados correctamente");
            }
        } else {
            $arrResponse = array('status' => false, 'msg' => "No es posible almacenar datos");
        }
        return $arrResponse;
    }
}
