<?php

namespace App\Http\Controllers;

use App\Models\Credencial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CredencialController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Credencial::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'data_emissao' => 'required|date',
            'validade' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $registro = Credencial::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Credencial cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Credencial::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Credencial não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Credencial::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Credencial não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'tipo' => 'sometimes|string|max:255',
            'data_emissao' => 'sometimes|date',
            'validade' => 'sometimes|date',
            'descricao' => 'sometimes|nullable|string',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Credencial atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Credencial::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Credencial não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
