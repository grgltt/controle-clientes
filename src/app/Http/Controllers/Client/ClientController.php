<?php 

namespace App\Http\Controllers\Client; 

use App\Http\Controllers\Controller; 
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller 
{ 

    public function store(StoreClientRequest $request)
    {
        $request['cpf'] = preg_replace( '/[^0-9]/is', '', $request['cpf']);

        $client = Client::create($request->all());

        return [
            'success' => true,
            'message' => 'Cliente cadastrado com sucesso. ID: ' . $client->id,
        ];
    }

    public function show($id)
    { 
        $client = Client::find($id);

        if(!$client){
            return [
                'success' => false,
                'message' => 'Cliente não encontrado',
            ];
        }

        return [
            'success' => true,
            'client' => [
                'id' => $client->id,
                'name' => $client->name,
                'phone' => $client->phone,
                'cpf' => $client->cpf,
                'license' => $client->license,
            ],
        ];
    }

    public function delete($id)
    {
        $client = Client::find($id);

        if(!$client){
            return [
                'success' => false,
                'message' => 'Cliente não encontrado',
            ];
        }

        $client->delete();

        return [
            'success' => true,
            'message' => 'Cliente excluído com sucesso',
        ];

    }

    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::find($id);

        if(!$client){
            return [
                'success' => false,
                'message' => 'Cliente não encontrado',
            ];
        }

        $request['cpf'] = preg_replace( '/[^0-9]/is', '', $request['cpf']);

        $client->update($request->all());

        return [
            'success' => true,
            'message' => 'Cliente atualizado com sucesso',
        ];
    }

    public function license($number)
    {
        $clients = [];

        $client = Client::where('license', 'like', '%' . $number)->get();

        foreach ($client as $item) {
            $clients[] = [
                'id' => $item->id,
                'name' => $item->name,
                'phone' => $item->phone,
                'cpf' => $item->cpf,
                'license' => $item->license,
            ];
        }

        return [
            'success' => true,
            'clients' => $clients,
        ];
    }


}