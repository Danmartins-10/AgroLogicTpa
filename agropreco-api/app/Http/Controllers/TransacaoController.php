<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Transacao::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'tipo_transacao' => 'required|string|max:255',
            'data' => 'required|date',
            'preco_fechado' => 'required|numeric|min:0',
        ]);

        $registro = Transacao::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transacao cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Transacao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Transacao não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Transacao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Transacao não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'tipo_transacao' => 'sometimes|string|max:255',
            'data' => 'sometimes|date',
            'preco_fechado' => 'sometimes|numeric|min:0',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transacao atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Transacao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Transacao não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
