<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\Categorie_Operation;
use App\Models\Client;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::get();
        $categorie_operations = Categorie_Operation::get();
        $clients = Client::get();

        return view('operation.index',compact('operations'),compact('categorie_operations'))->with('clients',$clients);
    }


    // retourne la vue pour créer 
    public function create()
    {
        $categorie_operations = Categorie_Operation::get();
        $clients = Client::get();
        return view('operation.create',compact('categorie_operations'),compact('clients'));
    }


   // fonction qui enregistre une nouvelle catégorie
    public function store(Request $request)
    {
    
        if($request->get('client_id')){

            Operation::create(array_merge($request->only('nature','montant','date','type_operation','client_id'),[
                'categorie_operation_id' => $request->get('categorie_operation'),
                
            ]));
        }
        else{
            $request->validate([
                'nature' => 'required|max:255',
                'montant' => 'required',
                'date' => 'required',
                'type_operation' =>  'required|boolean',
                'categorie_operation_id' => $request->get('categorie_operation')
            ]);
    
            Operation::create(array_merge($request->only('nature','montant','date','type_operation'),[
                'categorie_operation_id' => $request->get('categorie_operation'),
            ]));
        }
        

        return redirect()->route('operation.index')
        ->withSuccess(__('La catégorie à été créé correctement'));
    }



    // retourne la vue d'édition en fonction de l'id
    public function edit(Operation $operation)
    {
        $clients = Client::get();
        $categorie_operations = Categorie_Operation::get();
        return view('operation.edit', [
            'operation' => $operation
        ])
        ->with('categorie_operations',$categorie_operations)
        ->with('clients',$clients);
    }


    // fonction qui met à jour la catégorie
    public function update(Request $request, Operation $operation)
    {
        if($request->get('client_id')){
            $client_id = $request->get('client_id');
        }
        else{
            $client_id = NULL;
        }
        
        $operation->update(array_merge($request->only('nature','montant','date','type_operation'),[
            'categorie_operation_id' => $request->get('categorie_operation'),
            'client_id' => $client_id,
        ]));

        return redirect()->route('operation.index')
            ->withSuccess(__("L'operation a été mis à jour !"));
    }

    // retourne la vue d'édition en fonction de l'id
    public function show(Operation $operation)
    {
        return view('operation.show', [
            'operation' => $operation
        ]);
    }


    //fonction pour supprimer la catégorie
    public function destroy(Operation $operation)
    {
        $operation->delete();

        return redirect()->route('operation.index')
            ->withSuccess(__('Catégorie supprimée.'));
    }
}
