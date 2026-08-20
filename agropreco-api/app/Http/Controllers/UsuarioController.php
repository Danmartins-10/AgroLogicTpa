<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Usuario::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:usuarios,email',
            'senha' => 'required|string|max:255',
            'tipo_usuario' => 'required|string|max:255',
            'data_cadastro' => 'required|date',
        ]);

        $validated['senha'] = Hash::make($validated['senha']);
        $registro = Usuario::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Usuario cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Usuario::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Usuario::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'nome' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|max:255|unique:usuarios,email,' . $registro->id,
            'senha' => 'sometimes|string|max:255',
            'tipo_usuario' => 'sometimes|string|max:255',
            'data_cadastro' => 'sometimes|date',
        ]);

        if (isset($validated['senha'])) {
            $validated['senha'] = Hash::make($validated['senha']);
        }

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Usuario atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Usuario::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
