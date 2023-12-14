<div class="languajes-info mt-3">
    <div class="title-profile">
        <h5 class="fs-5">Idiomas</h5>
        <a type="button" id="btn-modal">
            <i class="bi bi-plus-circle"></i>
        </a>

    </div>
    <?php $languajes = User::getLanguajes();

    ?>

    <div class="card-languajes">
        <div class="card-body">
            <?php

            if ($languajes) {
                foreach ($languajes as $key) {
            ?>
                    <ul class="list-unstyled">
                        <li class="text-primary"><strong> <?php echo  $key['idioma']; ?> </strong></li>
                        <li><strong>Escrito</strong>: <?php echo  $key['escrito']; ?>
                            <a type="button" name="modal-languaje-edit" id="btn-modal" value="<?php echo  $key['id']; ?>">
                                <!-- data-bs-target="#modalUpdate"
                            data-bs-toggle="modal" -->
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form id="_delete_languaje" method="post" class=" d-inline">
                                <button type="submit" class="btn-lgj">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <input type="hidden" name="languaje" value="<?php echo  $key['id']; ?>">
                            </form>
                        </li>

                        <li><strong>Oral</strong>: <?php echo  $key['oral']; ?></li>
                    </ul>
            <?php

                }
            }


            ?>
        </div>
        
    </div>
</div>