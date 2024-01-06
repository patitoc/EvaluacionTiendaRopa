<?php
require_once('../Models/cls_tienda.model.php');
$tienda = new Clase_Tienda;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $tienda->todos(); //llamo al modelo de tienda e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
           
    case "uno":
        $ID_tienda = $_POST["ID_tienda"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $tienda->uno($ID_tienda); //llamo al modelo de tienda e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;

    case 'insertar':
        //$ID_tienda = $_POST["ID_tienda"];
        $Nombre = $_POST["Nombre"];
        $Ciudad = $_POST["Ciudad"];
        $Categoria = $_POST["Categoria"];
        
        $datos = array(); //defino un arreglo
        //$datos = $tienda->insertar($ID_tienda, $Nombre, $Ciudad, $Categoria);
        //var_dump($datos);
        $datos = $tienda->insertar($Nombre, $Ciudad, $Categoria); //llamo al modelo de tienda e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_tienda = $_POST["IDtienda"];
        $Nombre = $_POST["Nombre"];
        $Ciudad = $_POST["Ciudad"];
        $Categoria = $_POST["Categoria"];
        
        $datos = array(); //defino un arreglo
        $datos = $tienda->actualizar($ID_tienda, $Nombre, $Ciudad, $Categoria); //llamo al modelo de tienda e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

    case 'eliminar':
        $ID_tienda = $_POST["ID_tienda"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $tienda->eliminar($ID_tienda); //llamo al modelo de tienda e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case "tienda_repetida":
        $ID_tienda = $_POST["ID_tienda"];
        $datos = array(); //defino un arreglo
        $datos = $tienda->tienda_repetida($ID_tienda); //llamo al modelo de tienda e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
}
