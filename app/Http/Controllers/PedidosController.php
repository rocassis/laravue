<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosRequest;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Log;

class PedidosController extends Controller
{
    /**sim
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($comprador)
    {

        $dados = Pedidos::where('id_comprador', $comprador)->get();


        return response()->json($dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePedidosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosRequest $request)
    {
        try {
            $categoria = new Pedidos();
            $categoria->fill($request->validated());
            $categoria->save();
            return response()->json(['message' => 'Pedido salva com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)$e);
            return response()->json(['message' => 'Ocorreu uma falha ao salvar a categoria!'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidosRequest $request, Pedidos $categoria)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidosRequest  $request
     * @param  \App\Models\Pedidos  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(PedidosRequest $request, Pedidos $categoria)
    {
        try {
            $categoria->fill($request->validated());
            $categoria->update();
            return response()->json(['message' => 'Pedido atualizada com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao atualizar o pedido!'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidos $categoria)
    {
        try {
            $categoria->delete();
            return response()->json(['message' => 'Pedido excluída com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao excluir o pedido!'], 500);
        }
    }

    /**
     * Aprovação do pedido
     *
     * @param Pedidos $pedido
     * @return void
     */
    public function approve(Pedidos $pedido)
    {
        try {
            $pedido->status(2);
            return response()->json(['message' => 'Pedido aprovado com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao aprovar o pedido!'], 500);
        }
    }

    /**
     * Recusa do pedido
     *
     * @param Pedidos $pedido
     * @return void
     */
    public function refuse(Pedidos $pedido)
    {
        try {
            $pedido->status(2);
            return response()->json(['message' => 'Pedido aprovado com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao aprovar o pedido!'], 500);
        }
    }
}
