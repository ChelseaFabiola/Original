<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comentario;
use App\Models\categorias;
use App\Models\platillos;
use Illuminate\Support\Facades\Storage;
use App\Models\eventos;
use App\Models\galeria;


class administrar extends Controller
{
    //
    public function index()
    {
        //recibir los datos de la base de datos
        $comentarios['comentarios'] = Comentario::all();
        $imagenes['imagenes'] = Galeria::all();


        return view('administrar.index', $comentarios, $imagenes);
    }
    public function misionvision()
    {
        $eventos['eventos'] = Eventos::all();

        return view('administrar.misionvision', $eventos);
    }
    public function horarios()
    {
        return view('administrar.horarios');
    }
    public function menu()
    {
        $leerdatos['lista'] = Categorias::all();
        $menu['platillos'] = Platillos::all();

        return view('administrar.menu', $leerdatos, $menu);
    }
    public function crearplatillo()
    {
        $leerdatos['lista'] = Categorias::all();

        return view('administrar.crearplatillo', $leerdatos);
    }
    public function editarplatillo($id)
    {
        $leerdatos['lista'] = Categorias::all();
        $datosplatillo = Platillos::findOrFail($id);

        return view('administrar.editarplatillo', $leerdatos, compact('datosplatillo'));
    }

    public function storeindex(Request $request)
    {
        $datosrecibidos = request()->all();
        Categorias::create($datosrecibidos);
        // print_r($_POST);
        return redirect('/admin/menu');
    }
    public function eliminar()
    {
        return redirect('/admin/menu');
    }
    public function eliminarCategoria($id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria->delete();
        return redirect('/admin/menu');
    }
    public function storeplatillo(Request $request)
    {
        // $datosplatillo=request()->all();
        //insertar imagen
        $datosplatillo = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $datosplatillo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Platillos::insert($datosplatillo);

        // return response()->json($datosplatillo);
        return redirect('/admin/menu');
    }
    public function eliminarplatillo($id)
    {
        $categoria = Platillos::findOrFail($id);
        if (Storage::delete('public/' . $categoria->imagen)) {
            Platillos::destroy($id);
        }
        $categoria->delete();
        return redirect('/admin/menu');
    }
    public function updateplatillo(Request $request, $id)
    {
        $datosplatillo = request()->except(['_token', '_method']);
        if ($request->hasFile('imagen')) {
            $categoria = Platillos::findOrFail($id);
            Storage::delete('public/' . $categoria->imagen);
            $datosplatillo['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Platillos::where('id', '=', $id)->update($datosplatillo);
        $datosplatillo = Platillos::findOrFail($id);
        $leerdatos['lista'] = Categorias::all();

        $datos = Platillos::findOrFail($id);
        return view('administrar.editarplatillo', $leerdatos, compact('datos', 'datosplatillo'));
    }
    public function updateevento(Request $request, $id)
    {
        // Obtenemos los datos del request excepto los campos de token y método
        $datosEvento = $request->except(['_token', '_method']);

        // Verificamos si hay una imagen en el request y la actualizamos si es el caso
        if ($request->hasFile('Imagen')) {
            $evento = Eventos::findOrFail($id);
            // Eliminamos la imagen anterior si existe
            Storage::delete('public/' . $evento->Imagen);
            // Guardamos la nueva imagen

            $datosEvento['Imagen'] = $request->file('Imagen')->store('uploads', 'public');
        }

        // Actualizamos los datos del evento en la base de datos
        Eventos::where('id', '=', $id)->update($datosEvento);

        // Volvemos a obtener los datos del evento actualizados
        $eventoActualizado = Eventos::findOrFail($id);

        // Obtenemos otros datos necesarios, si los hay
        $leerdatos['lista'] = Categorias::all();
        $eventos['eventos'] = Eventos::all();

        // Retornamos la vista con los datos actualizados y otros datos necesarios
        return view('administrar.misionvision', $eventos, compact('eventoActualizado', 'leerdatos'));
    }




    public function quienesSomos()
    {
        $eventos['eventos'] = Eventos::all();

        return view('administrar.quienesSomos', $eventos);
    }
    public function updatequienessomos(Request $request, $id)
    {
        // Obtenemos los datos del request excepto los campos de token y método
        $datosEvento = $request->except(['_token', '_method']);

        // Verificamos si hay una imagen en el request y la actualizamos si es el caso
        if ($request->hasFile('Imagen')) {
            $evento = Eventos::findOrFail($id);
            // Eliminamos la imagen anterior si existe
            Storage::delete('public/' . $evento->Imagen);
            // Guardamos la nueva imagen

            $datosEvento['Imagen'] = $request->file('Imagen')->store('uploads', 'public');
        }

        // Actualizamos los datos del evento en la base de datos
        Eventos::where('id', '=', $id)->update($datosEvento);

        // Volvemos a obtener los datos del evento actualizados
        $eventoActualizado = Eventos::findOrFail($id);

        // Obtenemos otros datos necesarios, si los hay
        $leerdatos['lista'] = Categorias::all();
        $eventos['eventos'] = Eventos::all();

        // Retornamos la vista con los datos actualizados y otros datos necesarios
        return view('administrar.quienesSomos', $eventos, compact('eventoActualizado', 'leerdatos'));
    }



    public function storegaleria(Request $request)
    {
        // $datosplatillo=request()->all();
        //insertar imagen
        $datosplatillo = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosplatillo['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Galeria::insert($datosplatillo);

        // return response()->json($datosplatillo);
        return redirect('/admin/');
    }
    public function eliminargaleria($id)
    {
        $categoria = Galeria::findOrFail($id);
        if (Storage::delete('public/' . $categoria->foto)) {
            Galeria::destroy($id);
        }
        $categoria->delete();
        return redirect('/admin');
    }
    public function validarComentario($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->estatus = 1; // Cambia el estado de validar a 1
        $comentario->save();

        return redirect()->back()->with('success', 'Comentario validado exitosamente.');
    }
    public function eliminarComentario($id)
{
    $comentario = Comentario::findOrFail($id);
    $comentario->delete();

    return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
}
    
}
