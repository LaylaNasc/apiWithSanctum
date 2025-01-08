<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retorna todos os clientes do banco de dados
        return ApiResponse::success(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validação  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required'
        ]);

        //add um novo cliente
        $client = Client::create($request->all());

        return ApiResponse::success($client);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //retorna cliente por id
         $client = Client::find($id);

         //retorna a resposta
         if($client){
             return ApiResponse::success($client);
         } else {
             return ApiResponse::error('Cliente não encontrado!');
         }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validação  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required'
        ]);

        //alterando os dados
        $client = Client::find($id);
        if($client){
            $client->update($request->all());
            return ApiResponse::success($client);
        } else {
            return ApiResponse::error('Cliente não encontrado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //deletando cliente
        $client = Client::find($id);
        if($client){
            $client->delete();
            return ApiResponse::success('Cliente deletado com sucesso');
        } else {
            return ApiResponse::error('Cliente não encontrado');
        }
    }
}
