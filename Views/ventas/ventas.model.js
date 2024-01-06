
class Ventas_Model {
  constructor(
    ID_venta,
    ID_tienda,
    ID_cliente,
    Producto,
    Cantidad,
    Precio,
    Total,
    Fecha_venta,
    Ruta
  ) {
    this.ID_venta = ID_venta;
    this.ID_tienda = ID_tienda;
    this.ID_cliente = ID_cliente;
    this.Producto = Producto;
    this.Cantidad = Cantidad;
    this.Precio = Precio;
    this.Total = Total;
    this.Fecha_venta = Fecha_venta;
    this.Ruta = Ruta;
  }

  todos() {
    var html = "";
    $.get("../../Controllers/venta.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.ID_venta}</td>
                <td>${valor.ID_tienda}</td>
                <td>${valor.ID_cliente}</td>
                <td>$ ${valor.Producto}</td>
                <td>$ ${valor.Cantidad}</td>
                <td>$ ${valor.Precio}</td>
                <td>$ ${valor.Total}</td>
                <td>$ ${valor.Fecha_venta}</td>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.ID_venta
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.ID_venta
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.ID_venta
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_ventasropa").html(html);
    });

  }
  
  venta() {
    var html = "";

    $.get("../../Controllers/venta.controller.php?op=ventaropa", (res) => {
      res = JSON.parse(res);
      html += " <select name='ID_venta' id='ID_venta' class='form-control'>";
      $.each(res, (index, valor) => {
        html += `<option value="${valor.Precio} ${valor.Producto}">${valor.Precio} ${valor.Producto}</option>`;
      });
      html += '</select>'
      $("#ventaropa").html(html);
    });

  }
  
  clientes() {
    var html = "";
    $.get("../../Controllers/venta.controller.php?op=clientes", (res) => {
      res = JSON.parse(res);
      html += " <select name='ID_cliente' id='ID_cliente' class='form-control'>";
      $.each(res, (index, valor) => {
        html += `<option value="${valor.Nombres} ${valor.Apellidos}">${valor.Nombres} ${valor.Apellidos}</option>`;
      });
      html += '</select>'
      $("#clientess").html(html);
    });

  }

  insertar() {

    var dato = new FormData();
    dato = this.Fecha_venta;
    $.ajax({
    url: "../../Controllers/venta.controller.php?op=insertar",
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      console.log(res);
        res = JSON.parse(res);
        if(res === "ok"){
            Swal.fire("Venta", "Venta Registrada", "success");
            todos_controlador();
        }else{
            Swal.fire("Error", res, "error"); 
        }
    }
   });
   this.limpia_Cajas();    
  }

  uno() {
    var ID_venta = this.ID_venta;
    $.post(
      "../../Controllers/venta.controller.php?op=uno",
      { ID_venta: ID_venta },
      (res) => {
        res = JSON.parse(res);

        $("#ID_venta").val(res.ID_venta);
        $("#ID_tienda").val(res.ID_tienda);
        $("#ID_cliente").val(res.ID_cliente);
        $("#Producto").val(res.Producto);
        $("#cantidad").val(res.Cantidad);
        $("#precio").val(res.Precio);
        $("#total").val(res.Total);
        $("#Fecha_venta").val(res.Fecha_venta);
      }
    );
    $("#ModalVentasRopa").modal("show");
  }

  editar() {
    var dato = new FormData();
    dato = this.Fecha_venta;
    console.log('ID_venta',this.ID_venta)
    console.log('ID_tienda',this.ID_tienda)
    console.log('ID_cliente',this.ID_cliente)
    console.log('Producto',this.Producto)
    console.log('Cantidad',this.Cantidad)
    console.log('Precio',this.Precio)
    console.log('Total',this.Total)
    console.log('Fecha_venta', this.Fecha_venta)

    $.ajax({
      url: "../../Controllers/venta.controller.php?op=actualizar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("Ventas", "Venta Actualizada", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  eliminar() {
    console.log('Venta a eliminar',this.ID_venta)
    var ID_venta = this.ID_venta;

    Swal.fire({
      title: "Ventas",
      text: "Esta seguro de eliminar la venta",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/venta.controller.php?op=eliminar",
          { ID_venta: ID_venta },
          (res) => {
            console.log('respuesta servidor',res);
            
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("Venta", "Venta Eliminada", "success");
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

  limpia_Cajas(){
    document.getElementById("ID_venta").value = "";
    document.getElementById("ID_tienda").value = "";  
    document.getElementById("ID_cliente").value = "";
    document.getElementById("Producto").value = "";
    document.getElementById("cantidad").value = "";
    document.getElementById("precio").value = "";
    document.getElementById("total").value = "";
    document.getElementById("Fecha_venta").value = "";
    $("#ModalVentasRopa").modal("hide");
  }
}
