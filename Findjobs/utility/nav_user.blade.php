<nav class="sticky-top navbar navbar-expand-lg shadow-sm bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex text-center" href="inicio.php">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                    <path
                        d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z" />
                </svg>
                FindJobs
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <div class="options me-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                    <?php

                        $title = isset($_SESSION['name_comp']) ? $_SESSION['name_comp']:'';

                        if($_SESSION['user_type'] === 'Empresa'){
                    ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="empresa.php">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="addjob">Añadir vacante</a>
                            </li>
                            
                    <?php
                        }else{
                        $title = $_SESSION['name'].' '. $_SESSION['lastname'] 
                    ?>
                            <li class="nav-item">
                                <a class="nav-link active" id="vacantesd">Vacantes disponibles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inicio.php">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rqs">Ver mis solicitudes</a>
                            </li>
                    <?php
                        }
                    ?>
                    
                </ul>
               
            </div>
            
            <span class="navbar-text">

                <?php
                   
                echo '<a href="#" class="btn btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                        ' .
                    $title .
                    '</a>';
                ?>
            </span>
            <a href="../utility/close-session.blade.php" class="btn btn-danger ms-2">Cerrar sesión</a>
        </div>
    </div>
</nav>
