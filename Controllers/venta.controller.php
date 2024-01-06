<?php
require_once('../Models/cls_ventas.model.php');
$ventaropa = new Clase_Ventas;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;

    case 'ventaropa':
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;

    case 'clientes':
            $datos = array(); //defino un arreglo
            $datos = $ventaropa->clientes(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
            while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
                $todos[] = $fila;
            }
            echo json_encode($todos); //devuelvo el arreglo en formato json
            break;

    case "uno":
        $ID_venta = $_POST["ID_venta"]; //defino una variable para almacenar el id del ventaropa, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->uno($ID_venta); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $ID_tienda = $_POST["ID_tienda"];
        $ID_cliente = $_POST["ID_cliente"];
        $Producto = $_POST["Producto"];
        $Cantidad = $_POST["cantidad"];
        $Precio = $_POST["precio"];
        $Total = $_POST["total"];
        $Fecha_venta = $_POST["Fecha_venta"];
        
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->insertar($ID_tienda, $ID_cliente, $Producto, $Cantidad, $Precio, $Total, $Fecha_venta); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_venta = $_POST["ID_venta"];
        $ID_tienda = $_POST["ID_tienda"];
        $ID_cliente = $_POST["ID_cliente"];
        $Producto = $_POST["Producto"];
        $Cantidad = $_POST["cantidad"];
        $Precio = $_POST["precio"];
        $Total = $_POST["total"];
        $Fecha_venta = $_POST["Fecha_venta"];
        
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->actualizar($ID_venta, $ID_tienda, $ID_cliente, $Producto, $Cantidad, $Precio, $Total, $Fecha_venta); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_venta = $_POST["ID_venta"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->eliminar($ID_venta); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case "venta_repetida":
        $ID_venta = $_POST["ID_venta"];
        $datos = array(); //defino un arreglo
        $datos = $ventaropa->codigo_repetido($ID_venta); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
}
