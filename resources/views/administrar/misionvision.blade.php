@include('administrar.header')



<style>
    .container-vision {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 70vh; /* Ajusta la altura del contenedor según el tamaño de la ventana */
    }
    .card {
      width: 250px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: #FFFFFF;
      margin-right: 60px; /* Espacio entre los cards */
    }
    .word-container {
      text-align: center;
    }
    hr {
      height: 2px; /* Altura del hr */
      border: none; /* Elimina el borde predeterminado */
      background-color: #FF5733; /* Color de fondo del hr */
      margin: 20px 0; /* Márgenes superior e inferior */
    }
    .imglaposte {
      border-radius: 10px; /* Bordes redondeados para la imagen */
      border: 2px solid white; /* Borde blanco alrededor de la imagen */
    }
    .p-vision {
      text-align: center; /* Estilo para el párrafo con la clase pmision */
    }
    .union {
        margin-right: 80px; /* Ajuste del margen derecho */
    }

    /* Estilos específicos para tamaños de pantalla pequeños */
    @media screen and (max-width: 768px) {
            .container-vision {
                flex-direction: column;
                height: auto; /* Ajusta la altura automáticamente */
            }
            .card {
                margin: 0 auto 20px; /* Centra el card y agrega espacio entre ellos */
                width: 80%; /* Ancho ajustado */
            }
            .segunda-col-vertical {
                margin-left: 0; /* Elimina el margen izquierdo en pantallas pequeñas */
            }
            .union {
                flex-direction: column; /* Cambia a una columna en pantallas pequeñas */
                align-items: center; /* Centra los elementos */
            }
        }

  </style>
  <div> 
  <br><br><br><br><br><br><br>
@foreach($eventos as $evento)
@if($evento->Nombre == "vision")
    <form action="{{ url('/admin/misionvision/editar/'.$evento->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf <!-- Agregar el token CSRF -->
        <h1 class="p-vision">Visión</h1>
         <label for="Descripcion" style="margin-left: 536px;">Descripción:</label><br>
        {{-- <input type="text" name="Descripcion" id="Descripcion" value="{{ $evento->Descripcion }}"><br> --}}
        <textarea style="width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ccc; 
        border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" class="form-control" id="Descripcion" name="Descripcion" rows="3" placeholder="Ingresa un Descripcion">{{$evento->Descripcion}}</textarea>

<br>

        <label for="Imagen" style="margin-left: 536px;">Imagen:</label><br>
        <img src="/storage/{{$evento->Imagen}}" alt="{{ $evento->Nombre }}" width="150" style="border: 3px solid #9F625B; border-radius: 5px; margin-left: 650px"><br>
        <!-- Mostrar la imagen actual del evento -->
        
    
        <input type="file" name="Imagen" id="Imagen" style="margin-left: 580px"><br>   
        <!-- Permitir al usuario seleccionar una nueva imagen -->
        <br>
        <button type="submit" class="btn btn-outline-success" style="margin-left: 680px" onclick="return confirm('¿Quieres actualizar la información de {{$evento->Nombre}}?')">Actualizar</button>
    </form>
@endif
@endforeach
<br><br>
@foreach($eventos as $evento)
@if($evento->Nombre == "mision")
    <form action="{{ url('/admin/misionvision/editar/'.$evento->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf <!-- Agregar el token CSRF -->
        <h1 style="text-align: center;">Misión</h1>
        <label for="Descripcion" style="margin-left: 536px;">Descripción:</label><br>
        <textarea style="width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ccc; 
        border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" class="form-control" id="Descripcion" name="Descripcion" rows="3" placeholder="Ingresa un Descripcion">{{$evento->Descripcion}}</textarea>
<br>
        <label for="Imagen" style="margin-left: 536px;">Imagen:</label><br>
        <img src="/storage/{{$evento->Imagen}}" alt="{{ $evento->Nombre }}" width="150" style="border: 3px solid #9F625B; border-radius: 5px; margin-left: 650px"><br>
        <!-- Mostrar la imagen actual del evento -->
        
        <input type="file" name="Imagen" id="Imagen" style="margin-left: 580px"><br>   
        <!-- Permitir al usuario seleccionar una nueva imagen -->
        <br>
        <button type="submit" class="btn btn-outline-success" style="margin-left: 680px" onclick="return confirm('¿Quieres actualizar la información de {{$evento->Nombre}}?')">Actualizar</button>

    </form>
@endif
@endforeach




 <!-- <div class="container-vision">
        <div class="card left-card">
        <div class="word-container">
                <h5>Visión</h5>
                <hr> 
        </div>
        <p class="p-vision">Ser reconocidos como el destino preferido para los amantes de la comida, destacando por nuestra innovación en sabores y compromiso con la satisfacción de nuestros clientes.</p>
        </div>
        <img class="imglaposte" src="img/laPoster.jpg" alt="BP La Burguesía del Pueblo" width="300px" height="410px">
  </div>-->

  <!--Segundo conteiner-->
 <!-- <div class="container-vision">
        <img class="imglaposte" src="img/mision.jpg" alt="BP La Burguesía del Pueblo" width="300px" height="410px">
        
        <div class="card right-card" style="margin-left: 60px;">
            <div class="word-container">
                <h5>Misión</h5>
                <hr> 
            </div>
            <p class="p-vision">Brindar a nuestros clientes una experiencia excepcional mediante la preparación de platillos de calidad, funcionando sabores auténticos en cada bocado creando momentos memorables para nuestros clientes.</p>
        </div>
 </div>
<br><br><br>
</div>

<div class="text-center justify-content-center">
    <h2>——— Objetivos ———</h2>
</div>
<br><br>

<div class="union" style="display: flex;"> 
    <div class="primera-col-vertical" style="margin-left: 185px;"> 
        <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="img/consistencia.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Garantizar la consistencia en la calidad de los productos.</h5> 
            </div>
        </div>
        <br>
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/menu.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Ampliar la variedad del menú con opciones creativas y deliciosas.<br><br></h5> 
            </div>
        </div>
        <br>
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/mejora.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Ser una empresa incluyente siempre con el pro de la mejora continuidad.</h5> 
            </div>
        </div>
    </div>

    
    <div class="segunda-col-vertical">
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/mano.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Fomentar la economía local.  <br><br><br></h5> 
            </div>
        </div>
        <br>
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/camaraderia.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Establecer alianzas locales para promover la participación comunitaria.</h5> 
            </div>
        </div>
        <br>
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/estandares.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Mantener altos estándares de calidad en todos nuestros productos.</h5> 
            </div>
        </div>
    </div>
    <div>
        <br>
        <img src="img/objetivos.jpg" alt="BP La Burguesía del Pueblo" width="506px" height="407px" style="border-radius: 20px; border: 2px solid white;">
        <br><br>
        <div style="display: flex; justify-content: space-between;">
            <div class="card" style="width: 14rem;"> 
                <img class="card-img-top" src="img/clasificacion.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 14px;">Mejorar continuamente la eficiencia operativa y la experiencia de los clientes.</h5> 
                </div>
            </div>
            <div class="card" style="width: 14rem; margin-right: 125px;">
                <img class="card-img-top" src="img/mexico.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 14px;">Expandirnos en toda la republica mexicana.</h5> 
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>



<div class="text-center justify-content-center">
    <h2>——— Valores ———</h2>
</div>
<br><br>

<div class="union" style="display: flex;"> 
    <div class="primera-col-vertical" style="margin-left: 185px;"> 
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/pasion.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Pasión</h5> 
                <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px;">En cada plato, palpita nuestra pasión por la cocina auténtica y los sabores excepcionales.</h6>
            </div>
        </div>
    </div>

    
    <div class="segunda-col-vertical">
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/comercio-justo.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Compromiso</h5> 
                <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px;">Compromiso con la satisfaccion del cliente.<br><br><br></h6>
            </div>
        </div>
        <br>
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/honesto.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Honestidad</h5> 
                <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px;">Preparación transparente y sabores genuinos que hablan por sí mismos.<br><br></h6>
            </div>
        </div>
        <br>
    </div>
    
    <div class="segunda-col-vertical">
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/innovacion.png" alt="Card image cap" style="max-width: 30%; height: auto;">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Innovación</h5> 
                <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px;">Innovacion en la creación de platillos.<br><br><br></h6>
            </div>
        </div>
        <br>
        <div class="card" style="width: 14rem;"> 
            <img class="card-img-top" src="img/seguridad.png" alt="Card image cap" style="max-width: 30%; height: auto;">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Transparencia</h5> 
                <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px;">Ingredientes frescos, preparación transparente, sabores genuinos.</h6>
            </div>
        </div>
        <br>
    </div>
    
    
    <div class="segunda-col-vertical">
        <div class="card" style="width: 14rem;">
            <img class="card-img-top" src="img/responsabilidad.png" alt="Card image cap" style="max-width: 30%; height: auto;"> 
            <div class="card-body">
                <h5 class="card-title" style="font-size: 14px;">Responsabilidad</h5> 
                <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px;">Responsabilidad social y apoyo a la comunidad.<br><br><br></h6>
            </div>
        </div>
    </div>
</div>
<br><br>
<div style="display: flex; justify-content: center;">
    <img class="card-img-top" src="img/valores.jpg" alt="Card image cap" style="max-width: 50%; height: auto; border: 2px solid white; border-radius: 10px;"> 
</div>
    -->


@include('administrar.footer')      