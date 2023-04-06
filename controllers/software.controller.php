<?php

require_once '../models/software.php';

if (isset($_POST['operation'])){
  
  $software = new Software();

  if ($_POST['operation']=='listarSoftware'){
    $datosObtenidos = $software->listarSoftware();

    if (count($datosObtenidos) == 0){
      echo "<tr><td> No se encontraron datos</td></tr>";
  }else{
      foreach($datosObtenidos as $software){
         echo "
          <tr>
              <td>{$software['idsoftware']}</td>
              <td>{$software['nombre']}</td>
              <td>{$software['precio']}</td>
              <td>{$software['fechalanzamiento']}</td>
              <td>{$software['tiposoftware']}</td>
              <td>{$software['desarrollador']}</td>
              <td>{$software['lenguajedesarrollado']}</td>
              <td>
                  <a href='#' class='btn btn-sm btn-outline-success' title='Editar'><i class='bi bi-pencil'></i></a> -            
                  <a href='#' class='eliminar  btn btn-sm btn-outline-danger'title='Eliminar' data-codigo='{$software['idsoftware']}' ><i class='bi bi-trash'></i></a>
              </td>
          </tr>
          ";
      }
  }
  
  }

}
?>