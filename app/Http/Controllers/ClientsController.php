<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Operation;
use App\Models\Categorie_Operation;


class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::get();

        return view('client.index',compact('clients'));
    }


    // retourne la vue pour créer 
    public function create()
    {
        return view('client.create');
    }


   // fonction qui enregistre une nouvelle catégorie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255' ,
            'appellation'=>'required|max:5',
        ]);

        Client::create($validated);



        return redirect()->route('client.index')
        ->withSuccess(__("Le client à été créé correctement"));
    }



    // retourne la vue d'édition en fonction de l'id
    public function edit(Client $client)
    {
        return view('client.edit', [
            'client' => $client
        ]);
    }


    // fonction qui met à jour la catégorie
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255' ,
            'appellation'=>'required|max:5',
        ]);
        
        $client->update($validated);

        return redirect()->route('client.index')
            ->withSuccess(__("Le client a été mis à jour !"));
    }

    // retourne la vue d'édition en fonction de l'id
    public function show(Client $client)
    {
        $operations = Operation::where('client_id',$client['id'])->get();
        $categorie_operations = Categorie_Operation::get();
        return view('client.show', [
            'client' => $client
        ],compact('operations'),)->with('categorie_operations',$categorie_operations);
    }


    //fonction pour supprimer la catégorie
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')
            ->withSuccess(__("Le client a été supprimée."));
    }
}
