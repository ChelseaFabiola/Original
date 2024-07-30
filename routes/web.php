<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\ComentarioController;
use App\Models\eventos;
use App\Http\controllers\cliente;
use App\Http\controllers\administrar;

//pagina de inicio de la burguesia
Route::get('/', function () {
    return view('burguesia.index');
});
//Cargar el carrito para que funcione desde el inicio
Route::get('/carrito', function () {
    return view('burguesia.carrito');
})->name('carrito');
//cargar la galeria de imagenes para que funcione en el inicio.
Route::get('/', [ComentarioController::class, 'index']);
//cargar los comentarios de los usuarios
Route::post('/', [ComentarioController::class, 'store']);
//página de misión visión
Route::get('/misionvision', function () {
    $eventos['eventos'] = Eventos::all();

    return view('burguesia.misionvision', $eventos);
});
//página del menu
Route::get('/menu', function () {
    return view('burguesia.menu');
});
//lista de categorias en el menú
Route::get('/menu', [cliente::class, 'menucliente']);
//página de quienes somos
Route::get('/quienesSomos', function () {
    $eventos['eventos'] = Eventos::all();

    return view('burguesia.quienesSomos', $eventos);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //toda la funcionalidad del administrador
    //index admin
    Route::get('/admin', [administrar::class, 'index'])->name('administrar.index');
    //eliminar comentario para que funcione el index
    Route::delete('/eliminar-comentario/{id}', [administrar::class, 'eliminarComentario'])->name('eliminar.comentario');
    //validar el estado del comentario
    Route::post('/validar-comentario/{id}', [administrar::class, 'validarComentario'])->name('estatus.comentario');
    //subir una foto a la galeria de imagenes
    Route::post('/admin/create/galeria', [administrar::class, 'storegaleria']);
    //eliminar foto de la galeria de imagenes
    Route::delete('/admin/galeria/eliminar/{id}', [administrar::class, 'eliminargaleria']);

    //vista de mision y vision administrativa, puede que no sea necesario mantenerla
    Route::get('/admin/misionvision', [administrar::class, 'misionvision']);
    //actualizar la mision o vision
    //Route::get('/admin/misionvision/editar/{id}', [administrar::class, 'updateEvento']);
    Route::patch('/admin/misionvision/editar/{id}', [administrar::class, 'updateEvento']);

    //vista de el menu administrativo
    Route::get('/admin/menu', [administrar::class, 'menu']);
    //ruta de eliminar categorias
    Route::delete('/admin/menu/{id}', [administrar::class, 'eliminarCategoria'])->name('categorias.eliminar');
    //crear una categoria
    Route::post('/admin/menu/crearcategoria', [administrar::class, 'storeindex'])->name('crearcategoria');
    //vista para editar un platillo del menu
    Route::get('/admin/menu/editar/{id}', [administrar::class, 'editarplatillo']);
    //actualizar el platillo en la base de datos
    Route::PATCH('/admin/menu/editar/{id}', [administrar::class, 'updateplatillo']);
    //eliminar un platillo del menu
    Route::delete('/admin/menu/eliminar/{id}', [administrar::class, 'eliminarplatillo']);

    //vista de quienes somos
    Route::get('/admin/quienesSomos', [administrar::class, 'quienesSomos']);
    //actualizar quienes somos
    //Route::get('/admin/quienesSomos/editar/{id}',[administrar::class,"updatequienessomos"]);
    Route::patch('/admin/quienesSomos/editar/{id}', [administrar::class, 'updatequienessomos']);

        //agregar platillo
    Route::post('/admin/menu',[administrar::class,"storeplatillo"])->name('platillo.crear');
    Route::get('/admin/crearplatillo',[administrar::class,"crearplatillo"]);
});

// Ruta para la página de administrador
// Route::middleware('auth')->get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

require __DIR__ . '/auth.php';
