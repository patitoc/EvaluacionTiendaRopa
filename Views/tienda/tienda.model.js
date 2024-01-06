
class TiendasRopa_Model {
  constructor(
    ID_tienda,
    Nombre,
    Ciudad,
    Categoria,
    Ruta
  ) {
    this.ID_tienda = ID_tienda;
    this.Nombre = Nombre;
    this.Ciudad = Ciudad;
    this.Categoria = Categoria;
    this.Ruta = Ruta;
  }
  todos() {
    var html = "";
    $.get("../../Controllers/tienda.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        var fondo;
        if(valor.Categoria == "Mujer") fondo ="bg-primary"
        else if(valor.Categoria == "Hombre" ) fondo = "bg-danger"
        else if(valor.Categoria == "Niños") fondo = "bg-success"
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Ciudad}</td>
                <td>${valor.Categoria}</td>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.ID_tienda
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.ID_tienda
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.ID_tienda
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_tiendasropa").html(html);
    });
  }

  insertar() {
    var dato = new FormData();
    dato = this.ID_tienda;
   $.ajax({
    url: "../../Controllers/tienda.controller.php?op=insertar",
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
        res = JSON.parse(res);
        if(res === "ok"){
            Swal.fire("Tienda", "Tienda Registrada", "success");
            todos_controlador();
        }else{
            Swal.fire("Error", res, "error"); 
        }
    }
   });
   this.limpia_Cajas();    
  }

  uno() {
    var ID_tienda = this.ID_tienda;
    $.post(
      "../../Controllers/tienda.controller.php?op=uno",
      { ID_tienda: ID_tienda },
      (res) => {
        res = JSON.parse(res);
        $("#ID_tienda").val(res.ID_tienda);
        $("#Nombre").val(res.Nombreombre);
        $("#Ciudad").val(res.Ciudad);
        $("#Categoria").val(res.Categoria);
      }
    );
    $("#ModalTiendasRopa").modal("show");
  }

  eliminar() {
    console.log('Tienda a eliminar',this.ID_tienda)
    var ID_tienda = this.ID_tienda;

    Swal.fire({
      title: "Tiendas de Ropa",
      text: "Esta seguro de eliminar la tienda",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/tienda.controller.php?op=eliminar",
          { ID_tienda: ID_tienda },
          (res) => {
            console.log('respuesta servidor',res);
            
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("Tienda", "Tienda Eliminada", "success");
              todos_controlador();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });

    this.limpia_Cajas();
  }

  editar() {
    var dato = new FormData();
    dato = this.ID_tienda;
    console.log('ID_tienda',this.ID_tienda)
    console.log('Nombre',this.Nombre)
    console.log('Ciudad',this.Ciudad)
    console.log('Categoria',this.Categoria)

    $.ajax({
      url: "../../Controllers/tienda.controller.php?op=actualizar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("Tienda", "Tienda Actualizada", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  codigo_repetido(){
    var codigo = this.codigo;
    $.post("../../Controllers/tienda.controller.php?op=codigo_repetido", {codigo: codigo}, (res) => {
        res = JSON.parse(res);
        console.log('respuesta', res)
        if( parseInt(res.codigo_repetido) > 0){
            $('#codigoRepetido').removeClass('d-none');
            $('#codigoRepetido').html('La tienda ya exite en la base de datos');
            $('button').prop('disabled', true);
        }else{
            $('#codigoRepetido').addClass('d-none');
            $('button').prop('disabled', false);
        }

    })
  }

  limpia_Cajas(){
    document.getElementById("ID_tienda").value = "";
    document.getElementById("Nombre").value = "";  
    document.getElementById("Ciudad").value = "";
    document.getElementById("Categoria").value = "";
    $("#ModalTiendasRopa").modal("hide");
  }
}
