<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie_Operation;

class CategorieOperationController extends Controller
{
    public function index()
    {
        $categorie_operations = Categorie_Operation::get();

        return view('categorie_operation.index',compact('categorie_operations'));
    }


    // retourne la vue pour créer 
    public function create()
    {
        return view('categorie_operation.create');
    }


   // fonction qui enregistre une nouvelle catégorie
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|max:255',
        ]);

        Categorie_Operation::create($validate);


        return redirect()->route('categorie_operation.index')
        ->withSuccess(__('La catégorie à été créé correctement'));
    }



    // retourne la vue d'édition en fonction de l'id
    public function edit(Categorie_Operation $categorie_operation)
    {
        return view('categorie_operation.edit', [
            'categorie_operation' => $categorie_operation
        ]);
    }


    // fonction qui met à jour la catégorie
    public function update(Request $request, Categorie_Operation $categorie_operation)
    {
       $validate = $request->validate([
            'nom' => 'required|max:255',
        ]);
        
        $categorie_operation->update($validate);

        return redirect()->route('categorie_operation.index')
            ->withSuccess(__("La categorie_operation a été mis à jour !"));
    }

    // retourne la vue d'édition en fonction de l'id
    public function show(Categorie_Operation $categorie_operation)
    {
        return view('categori_operation.show', [
            'categorie_operation' => $categorie_operation
        ]);
    }


    //fonction pour supprimer la catégorie
    public function destroy(Categorie_Operation $categorie_operation)
    {
        $categorie_operation->delete();

        return redirect()->route('categorie_operation.index')
            ->withSuccess(__('Catégorie supprimée.'));
    }
}

