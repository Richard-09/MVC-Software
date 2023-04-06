 
  $(document).ready(function(){

    function listarSoftware(){
      $.ajax({
          url: './controllers/software.controller.php',
          type: 'POST',
          data: {operation: 'listarSoftware'},
          dataType: 'text',
          success: function (result){
              $("#tabla").html(result);
          }
      });
    }

    $("#guardar").click(registrarSoftware);

    function registrarSoftware(){
      let nombresoftware= $("#nombresoftware").val();
      let precio= $("#precio").val();
      let fechaLanzamiento = $("#fechaLanzamiento").val();
      let tipoSoftware = $("#tipoSoftware").val();
      let desarrollador = $("#desarrollador").val();
      let lenguajeDesarrollado = $("#lenguajeDesarrollado").val();
      
      if (nombresoftware == "" || precio== "" || fechaLanzamiento == "" || tipoSoftware == "" || desarrollador == "" || lenguajeDesarrollado == ""){
          alert("Por favor complete los campos solicitados");
      }else{
          
          if(confirm("¿Esta seguro de registrar este nuevo curso?")){

              var datos = {
                'operation'           : 'registrarSoftware',
                'nombre'              : nombresoftware,
                'precio'              : precio,
                'fechalanzamiento'    : fechaLanzamiento,
                'tiposoftware'        : tipoSoftware,
                'desarrollador'       : desarrollador,
                'lenguajedesarrollado': lenguajeDesarrollado
              };

              $.ajax({
                  url:    './controllers/software.controller.php',
                  type:   'POST',
                  data:   datos,
                  success: function(e){
                      alert("El proceso se guardo correctamente");
                      $("#formulario-software")[0].reset();
                      $("#modalRegistro").modal('hide');
                      listarSoftware();
                  }
              });
          }
      }
  }


    listarSoftware();

  });