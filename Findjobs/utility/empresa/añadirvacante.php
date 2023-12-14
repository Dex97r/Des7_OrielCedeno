<?php
$array = array('error' => false);
$array['data'] = '
    <div class="row mt-2">
    <div class="col-12 shadow-p">
        <h1 class="mt-3 mb-3">Publicar Empleo</h1>
        <form id="add_jobs" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del empleo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del empleo</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="requisitos" class="form-label">Requisitos del empleo</label>
                <textarea class="form-control" id="requisitos" name="requisitos" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación del empleo</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salario ofrecido</label>
                <input type="text" class="form-control" id="salario" name="salario" required>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio del empleo</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="mb-3">
                <label for="tipo_contrato" class="form-label">Tipo de contrato</label>
                <select class="form-select" id="tipo_contrato" name="tipo_contrato" required>
                    <option value="">Seleccionar</option>
                    <option value="Tiempo completo">Tiempo completo</option>
                    <option value="Medio tiempo">Medio tiempo</option>
                    <option value="Por proyecto">Por proyecto</option>
                    <option value="Prácticas profesionales">Prácticas profesionales</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forma_aplicacion" class="form-label">Forma de aplicación</label>
                <select class="form-select" id="forma_aplicacion" name="forma_aplicacion" required>
                    <option value="">Seleccionar</option>
                    <option value="Formulario en línea">Formulario en línea</option>
                    <option value="Correo electrónico">Correo electrónico</option>
                    <option value="Entrega física de CV">Entrega física de
                        CV</option>
                    <option value="Entrevista">Entrevista</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Publicar Empleo</button>
            </div>
            </form>
            
            </div>
        </div>
    
    ';



echo json_encode($array);
