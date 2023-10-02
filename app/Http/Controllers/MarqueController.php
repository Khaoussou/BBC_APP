<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Traits\Format;
use Illuminate\Http\Request;
use App\Http\Resources\MarqueResource;
use App\Http\Requests\MarquePostRequest;
use Symfony\Component\HttpFoundation\Response;

class MarqueController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMarques = MarqueResource::collection(Marque::all());
        return $this->response(Response::HTTP_ACCEPTED, "", ["marques" => $allMarques]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarquePostRequest $request)
    {
        $libelleExist = Marque::getMarqueByLibelle($request->libelle)->first();
        if ($libelleExist) {
            return $this->response(Response::HTTP_UNAUTHORIZED, "Cette marque existe deja !", []);
        }
        $newMarque = new MarqueResource(Marque::create($request->all()));
        return $this->response(Response::HTTP_ACCEPTED, "Insertion réussie !", [$newMarque]);
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
