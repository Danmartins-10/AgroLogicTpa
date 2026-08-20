<?php

namespace App\Http\Controllers;

use App\Models\ContratoFuturo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContratoFuturoController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = ContratoFuturo::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'data_acordo' => 'required|date',
            'data_entrega' => 'required|date',
            'preco_acordado' => 'required|numeric|min:0',
            'observacoes' => 'nullable|string',
        ]);

        $registro = ContratoFuturo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'ContratoFuturo cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = ContratoFuturo::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'ContratoFuturo não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = ContratoFuturo::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'ContratoFuturo não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'data_acordo' => 'sometimes|date',
            'data_entrega' => 'sometimes|date',
            'preco_acordado' => 'sometimes|numeric|min:0',
            'observacoes' => 'sometimes|nullable|string',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'ContratoFuturo atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = ContratoFuturo::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'ContratoFuturo não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
