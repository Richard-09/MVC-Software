 
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

    listarSoftware();

  });