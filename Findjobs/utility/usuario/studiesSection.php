<?php $studies = User::getEducationInformation(); ?>

<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Educación</button>
    </li>
    <!-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Experiencias</button>
        </li> -->
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="academic-info">
            <div class="education-card mt-3">
                <div class="title-profile">
                    <h5 class="fs-5">Formación académica</h5>
                    <a type="button" id="academic_education_i">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>

                <?php

                    if ($studies) {

                        foreach ($studies as $key) {
                            echo '<div class="card-body mt-2">

                            <span>
                                <h5 class="text-primary fs-6">
                                    <strong>'.$key['carrera'].'</strong>
                                    <a type="button" name="academic_education_i" id="academic_education_i" value="'.$key['id'].'">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a type="button" id="_dele_s" value="'.$key['id'].'>"><i class="bi text-danger bi-trash"></i></a>
                                </h5>
                            </span>
                            <ul class="list-unstyled">
                                <li>'.$key['institucion'].'</li>
                                <li>'.$key['estado_educativo'].'</li>
                                <li>'.date("Y", strtotime($key['fecha_inicio'])) . ' - ' . date("Y", strtotime($key['fecha_fin'])).'></li>
                            </ul>
                        </div>';
                        }
                    }
                ?>
                

            </div> 
            <?php
                    include 'languajeSection.php';
                    include 'skillsSection.php';
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
</div>