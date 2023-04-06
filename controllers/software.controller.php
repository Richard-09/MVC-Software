<?php

require_once '../models/software.php';

if (isset($_POST['operation'])){
  
  $software = new Software();

  if ($_POST['operation']=='listarSoftware'){

    $datosObtenidos = $software->listarSoftware();
    $num = 1; 
        foreach($datosObtenidos as $software){
          echo "
            <tr>
                <td>$num</td>
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
            $num++;
        }
    

  }

  if($_POST['operation']=='registrarSoftware'){

    $datosForm = [
        "nombre"                => $_POST['nombre'],
        "precio"                => $_POST['precio'],
        "fechalanzamiento"      => $_POST['fechalanzamiento'],
        "tiposoftware"          => $_POST['tiposoftware'],
        "desarrollador"         => $_POST['desarrollador'],
        "lenguajedesarrollado"  => $_POST['lenguajedesarrollado']
    ];

    $software->registrarSoftware($datosForm);
  }

  if ($_POST['operation'] == 'eliminarSoftware'){
    $software->eliminarSoftware($_POST['idsoftware']);
  }

}
?>