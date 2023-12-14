<?php 

    $rqs = User::getJobApplication(); 

?>


    <div class="card shadow-p">
        <div class="card-body">
            <div class="title-profile text-primary">
                <h5 class="card-title ">Solicitudes de trabajo</h5>
            </div>
            <ul class="list-group list-group-flush">
                <?php
                   if($rqs){
                    foreach ($rqs as $row) {
                        echo '<li class="list-group-item hover">
                        '.$row['titulo'].'<br>
                       Empresa: <small>'.$row['nombre_empresa'].'</small>
                        <i class="bi bi-trash3"></i></li>';
                    }
                   }else{
                       echo' No se encontraron empleos a los que te hayas postulado';
                   }
                ?>
                
            </ul>

        </div>

    </div>
