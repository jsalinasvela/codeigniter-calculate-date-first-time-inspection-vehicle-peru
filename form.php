<h1>CRONOGRAMA</h1>
<p class="indicaciones">Ingresa los siguientes datos de tu vehículo para saber cuando le toca pasar revisión técnica por primera vez ( para vehículos del Estado, ingresar placa sin la "E" de adelante )</p>
<div class="cronograma">
  <form method="POST" action="<?php echo base_url('c_cronograma/calcular'); ?>" class="form-crono">
  <!--<form method="POST" class="form-crono">-->
    <label for="placanum">Placa:</label><div class="placadiv"><input type="text" name="placanumero" id="placanum" required autocomplete="off" spellcheck="false" class="ingreso-datos"></div>
    <label for="tipocarro">Tipo de vehículo:</label>
    <div>
      <select name="tipodecarro" id="tipocarro" class="ingreso-datos" required>
        <option value="" disabled selected>Elige el tipo de vehículo</option>
        <option value="particular">Particular</option>
        <option value="pasajeros">Taxi, Colectivo, S. Urbano, Escolar, etc</option>
        <option value="mercancias">Transporte de Mercancías</option>
      </select>
    </div>
    <label for="fabricacion">Año de fabricación:</label><div><select id="fabricacion" name="anofab" required class="ingreso-datos">
    <option value="" disabled selected>Elige el año de fabricación</option>
            <?php
          $year=date('Y');
            while ($year >= 1950) {
              echo '<option value="'.$year.'" class="circle">'.$year.'</option>';
              $year--;
            }
          ?>
    </select>
    </div>
    <div class="boton-cont"><button class="boton-crono" id="btn_submit">¿Cuándo me toca?</button></div>
  </form>
  <div class="placaimg">
    <?php echo file_get_contents('archivos/images/placanum_good.svg'); ?>
    <div class="resultado-crono">
      <p id="tit-res"></p> <!-- RESULTADO: -->
      <p id="msj-res"><span id="resultado-mes"></span></p>
    </div>
  </div>
</div>