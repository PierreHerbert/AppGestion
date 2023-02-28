<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\Categorie_Operation;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $operations = Operation::orderBy('date', 'desc')->get();
        $categorie_operations = Categorie_Operation::get();
        $clients = Client::get();
        
        return view('dashboard')->with('operations',$operations)
                                ->with('categorie_operations',$categorie_operations)
                                ->with('clients',$clients);
    }

    public static function MontantTotal(){
        $operations = Operation::get();
        $total = 0;
        foreach($operations as $operation){
            if($operation['type_operation'] == 1){
                $total = $total + $operation['montant'];
            }
            else{
                $total = $total - $operation['montant'];
            }
        }
        
        return $total;
    }
}
