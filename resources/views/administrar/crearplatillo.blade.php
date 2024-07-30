@include('administrar.header') 
<br><br><br><br><br>     
<h1 class="text-center">Crear un platillo</h1>
<br>
<form action="{{route('platillo.crear')}}" method="POST" enctype="multipart/form-data">
@include('administrar.formularioplatillo ')
</form>
@include('administrar.footer')      