<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaracteristiqueRequest;
use App\Http\Resources\CaracteristiqueResource;
use App\Models\Caracteristique;
use App\Traits\Format;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaracteristiqueController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCaract = CaracteristiqueResource::collection(Caracteristique::all());
        return $this->response(Response::HTTP_ACCEPTED, "", ["caractéristiques" => $allCaract]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CaracteristiqueRequest $request)
    {
        $newCaract = new CaracteristiqueResource(Caracteristique::create($request->all()));
        return $this->response(Response::HTTP_ACCEPTED, "Insertion réussie !", [$newCaract]);
    }

    public function valueCaract($idCaract)
    {
        $valeurs = Caracteristique::getValueCaract($idCaract)->first()->valeurs;
        return $this->response(Response::HTTP_ACCEPTED, "Voici les valeurs", ["valeurs" => $valeurs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
