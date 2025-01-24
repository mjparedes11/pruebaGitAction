<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Obtener todos los autores
    public function index()
    {
        return response()->json(Author::all(), 200);
    }

    // Obtener un autor por su ID
    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return response()->json($author, 200);
    }

    // Crear un nuevo autor
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'country' => 'sometimes|string|max:255',
        ]);

        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    // Actualizar un autor existente
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $this->validate($request, [
            'name' => 'sometimes|string|max:255',
            'country' => 'sometimes|string|max:255',
        ]);

        $author->update($request->all());
        return response()->json($author, 200);
    }

    // Eliminar un autor
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->delete();
        return response()->json(['message' => 'Author deleted'], 200);
    }
}
