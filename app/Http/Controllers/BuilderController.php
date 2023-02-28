<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Builder;
use Illuminate\Support\Facades\URL;

class BuilderController extends Controller
{

    public function index()
    {
        $builders = Builder::get();

        return view('builder.index',compact('builders'));
    }


    public function edit(Builder $builder)
    {
        return view('builder.edit', [
            'builder' => $builder
        ]);
    }


    // fonction qui met à jour la catégorie
    public function update(Request $request, Builder $builder)
    {
       $validate = $request->validate([
            'content' => 'required',
        ]);
        
        $builder->update($validate);

        return redirect()->route('builder.index')
            ->withSuccess(__("La builder a été mis à jour !"));
    }

    public function home(){

        $builders = Builder::get();

        return view('index',compact('builders'));
    }

    public function upload_image(Request $request){

        $resultArray = array();
        foreach ($request->file() as $file) {
            // Store image in home directory
            $newImage = $file->storeAs("images", $file->getClientOriginalName());

            $result = array(
                'name' => $file->getClientOriginalName(),
                'type' => 'image',
                'src' => URL::to('/storage/'.$newImage), 
                'height' => 350,
                'width' => 250
            );
            // we can also add code to save images in database here.
            array_push($resultArray, $result);
        }

        $response = array( 'data' => $resultArray );
        return json_encode($response);
    }
}
