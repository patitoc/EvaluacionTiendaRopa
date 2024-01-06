//archivo de donde llamar al procedimiento
//controlador

function init() {
  $("#form_ventaropa").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
  clientes();
  venta();
});

var todos_controlador = () => {
  var todos = new Ventas_Model("", "", "", "", "", "", "", "", "todos");
  todos.todos();
}

var venta = () => {
  var productos = new Ventas_Model("", "", "", "", "", "", "", "", "venta");
  productos.productos();
}

var clientes = () => {
  var clientes = new Ventas_Model("", "", "", "", "", "", "", "", "clientes");
  clientes.clientes();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_ventaropa")[0]);
   
    var ID_venta = document.getElementById("ID_venta").value;
    if(ID_venta > 0){
      var ventas = new Ventas_Model('','','','','','',formData,'editar');
      ventas.editar();
    }else{
      var ventas = new Ventas_Model('','','','','','',formData,'insertar');
      venta.insertar();  
    }
};

var eliminar=(ID_venta)=>{
    var eliminar = new Ventas_Model(ID_venta, "", "", "", "", "", "", "eliminar");
    eliminar.eliminar();
}


var editar = (ID_cliente) => {
    var uno = new Ventas_Model(ID_cliente, "", "", "", "", "", "", "", "uno");
    uno.uno();
};

;init();
