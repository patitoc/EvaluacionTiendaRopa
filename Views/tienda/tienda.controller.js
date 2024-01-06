//archivo de donde llamar al procedimiento
//controlador

function init() {
  $("#form_tiendasropa").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
});

var todos_controlador = () => {
  var todos = new TiendasRopa_Model("", "", "", "", "todos");
  todos.todos();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_tiendasropa")[0]);
    var ID_tienda = document.getElementById("IDtienda").value;

    console.log('ID_tiendas ', ID_tienda)
    //var ID_tienda = $('#ID_tienda').val();
    if(ID_tienda > 0){
      var tienda = new TiendasRopa_Model('','','',formData,'editar');
      tienda.editar();
    }else{
      var tienda = new TiendasRopa_Model('','','',formData,'insertar');
      tienda.insertar();  
    }
};

var eliminar=(ID_tienda)=>{
    var eliminar = new TiendasRopa_Model(ID_tienda, "", "", "", "eliminar");
    eliminar.eliminar();
}

var editar = (ID_tienda) => {
    var uno = new TiendasRopa_Model(ID_tienda, "", "", "", "uno");
    uno.uno();
};

var tienda_repetida = () => {
    var ID_tienda = $('#ID_tienda').val();
    var tienda = new TiendasRopa_Model('',ID_tienda,'','','','','','','tienda_repetida');
    tienda.tienda_repetida();
}

;init();
