<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
<title>Formulario Infraestructura</title>
<style>
  #main-grid {
  display: grid;
  grid-template-columns: auto auto auto;
}

#secondary-grid {
  display: grid;
  grid-template-columns: auto auto auto auto;
}

#contenido-grid {
  display: grid;
  grid-template-columns: auto;
}

#grid-firma {
  display: grid;
  grid-template-columns: auto auto;
}

#TADescripcion{
  width: 99%;
}

#alinearDerecha{
  text-align: right;
  width: 75%;
}

#tituloOrd{
  text-align: center;
  width: 75%;
}

#subOrd{
  text-align: center;
  width: 80%;
}

#TADescripcion {
    height: 10em;
    width: 100%;
}
</style>
</head>

<body>
  <div class="grid-container" id="main-grid">
    <div class="grid-item">
      <img src="http://localhost:8080/proyectov1/resources/assets/images/logo/1.png">
    </div>
    <div class="grid-item">
      <h1 id="tituloOrd">ORDEN DE TRABAJO</h1>
      <h2 id="subOrd">UNIDAD DE MANTENIMIENTO - INFRAESTRUCTURA</h2>
    </div>
    <div class="grid-item"></div>
    
   
  </div> 
  <div class="grid-container" id="secondary-grid">
    <div class="grid-item">
      <label for="nticket" id="nticket">N° Ticket</label>
    </div>
    <div class="grid-item" id="alinearDerecha">123</div>
    <div class="grid-item" id="fechaSolicitud">Fecha Solicitud</div>
    <div class="grid-item" id="fechaSolItem">08-09-2020</div>
    <div class="grid-item"><br>Edificio</div>
    <div class="grid-item" id="alinearDerecha"><br>CDT</div>
    <div class="grid-item"><br>Servicio</div>
    <div class="grid-item"><br>Cirugia</div>
    <div class="grid-item"><br>Unidad Espeficica</div>
    <div class="grid-item" id="alinearDerecha"><br>Maxilo-Facial</div>
    <div class="grid-item"><br>Categoria</div>
    <div class="grid-item"><br>Infraestructura</div>
    <div class="grid-item"><br>Estado Ticket</div>
    <div class="grid-item"><br>En Proceso</div>
    <div class="grid-item"><br>Especialidad Solicitada</div>
    <div class="grid-item" id="alinearDerecha"><br>Carpinteria</div>
    <div class="grid-item"><br>Responsable</div>
    <div class="grid-item"><br>Victor Aravena</div>
    <div class="grid-item"><br>Apoyo 1</div>
    <div class="grid-item" id="alinearDerecha"><br>Sin Asignar</div>
    <div class="grid-item"><br>Apoyo 2</div>
    <div class="grid-item"><br>Sin Asignar</div>
    <div class="grid-item"><br>Apoyo 3</div>
    <div class="grid-item" id="alinearDerecha"><br>Sin Asignar</div>
    <div class="grid-item"><br>Supervisor</div>
    <div class="grid-item"><br>Hector Jara</div>
    <div class="grid-item"><br>Fecha Programada</div>
    <div class="grid-item" id="alinearDerecha"><br>08-09-2020</div>
    <div class="grid-item"><br>Dias Ejecucion</div>
    <div class="grid-item"><br>1</div>
    <div class="grid-item"><br>Horas Ejecucion</div>
    <div class="grid-item" id="alinearDerecha"><br>1</div>
  </div> 
<br><br>
  <div class="grid-container" id="contenido-grid">
    <div class="grid-item"><label for="tituloP">Titulo Problema</label> </div>
    <div class="grid-item">
      <textarea id="TADescripcion" >
        At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
        </textarea>
    </div>
    <div class="grid-item"><label for="tituloP">Trabajo Realizado por la Unidad de Mantencion</label> </div>
    <div class="grid-item">
      <textarea id="TADescripcion">
        At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
        </textarea>
    </div>
  </div> 
  <br><br>
  <div class="grid-container" id="grid-firma">
    <div class="grid-item">
      <label for="nomfirsol">
        Nombre y Firma del solicitante</label></div>
    <div class="grid-item">
      <label for="firnomsol">_________________________________</label><br>
      <label for="usuariosolicitante">AAA</label>
    </div>
    <div class="grid-item">
      <label for="nomfirres">Nombre y Firma Responsable
        </label></div>
    <div class="grid-item">
      <label for="firnomres">_________________________________</label><br>
      <label for="usuarioresponsable">AAA</label>
    </div>
    <div class="grid-item">
      <label for="supresponsable">Nombre y Firma Supervisor Responsable</label>
    </div>
    <div class="grid-item">
      <label for="nomfirsup">_________________________________</label><br>
      <label for="supnomfir">AAA</label>
    </div>
   
  </div> 
<br><br>
</body>


</html>
