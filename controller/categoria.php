<?php
    //LLENANDO COMBOBOX DE CATEGORIAS
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();

    switch ($_GET["op"]) {
    case "combo":
        $datos = $categoria->get_categoria();
        //analizo si la variable datos es un arregloy si tiene datos
        if (is_array($datos)==true and count($datos)>0) {
            // $html = "<option></option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['cat_id'] . "'>" . $row['cat_nom'] . "</option>";
            }
            echo $html;
        }
            break;
        
    }

?>