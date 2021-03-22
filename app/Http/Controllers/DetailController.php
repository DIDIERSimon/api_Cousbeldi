<?php

namespace App\Http\Controllers;

use App\Http\Resources\Detail as ResourcesDetail;
use App\Http\Controllers\BaseAuthController as BaseController;
use App\Models\Detail;
use Dotenv\Validator;
use Illuminate\Http\Request;

class DetailController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details =  Detail::all();
        return $this->sendResponse(ResourcesDetail::collection($details), 'Affichage des details avec succès');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nom' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'prix' => 'required',
            'img_path' => 'required',
        ]);
        if($validator->fail()){
            return $this->sendError('Erreur lors de la validation !', $validator->errors());
        }
        $details = Detail::create($input);
        return $this->sendResponse(new ResourcesDetail($details), "Détails ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($details)
    {
        $details = Detail::findOrFail($details);
        if(is_null($details)){
            return $this->sendError('Details introuvable dans la base d\'information !');
        }
        return $this->sendResponse(new ResourcesDetail($details), "Détail trouver avec succès");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $details)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'nom' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'prix' => 'required',
            'img_path' => 'required',
        ]);
        if($validator->fails())
        {
            return $this->sendError('Impossible d\'update le plat !', $validator->errors());
        }
        $details->nom = $input['nom'];
        $details->description = $input['description'];
        $details->ingredients = $input['ingredients'];
        $details->prix = $input['prix'];
        $details->img_path = $input['img_path'];
        $details->save();
        return $this->sendResponse(new ResourcesDetail($details), 'Plat modifier avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($details)
    {
        $details->delete();
        return $this->sendResponse([], 'Plat supprimé avec succès !');
    }
}
