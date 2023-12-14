<div class="skills-info mt-3">
    <div class="title-profile">
        <h5 class="fs-5">Conocimientos y Habilides</h5>
        <a type="button" id="skill-modal">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>

    <div class="card-skills">
        <div class="card-body">
            <?php
                
                $array = User::getSkills();
                if($array){
                    foreach($array as $key) {
                        echo '
                         <button type="button" id="d-skill" class="btn btn-primary m-2 btn-unstyled" value="'. $key['id'] .'">
                         ' . $key['skill_name'] . ' 
                             <i class="bi bi-x-lg"></i>
                         </button>';
                         
                    }
                }
                
            ?>
        </div>
    </div>
</div>