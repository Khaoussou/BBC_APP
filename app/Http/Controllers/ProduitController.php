<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitPostRequest;
use App\Http\Resources\CaractProduitResource;
use App\Http\Resources\ProduitResource;
use App\Http\Resources\ProduitSuccursaleResource;
use App\Models\CaractProduit;
use App\Models\Produit;
use App\Models\ProduitSuccrusale;
use App\Models\SuccursaleAmi;
use App\Traits\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProduitController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProduit = ProduitResource::collection(Produit::all());
        $allProduitSucc = ProduitSuccursaleResource::collection(ProduitSuccrusale::where("succursale_id", 1)->get());
        return $this->response(Response::HTTP_ACCEPTED, "", ["produit" => $allProduit, "produitSucc" => $allProduitSucc]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitPostRequest $request)
    {
        DB::beginTransaction();
        $caracterisques = $request->caracteristique;
        $diff = [];
        $productCaract = [];
        if($productExist = Produit::getProduitByCode($request->code)->first()) {
            $productCaracts = CaractProduit::getCaractProduit($productExist->id)->get()->toArray();
            $productCaract = array_map(function ($produit) {
                if ($produit["unite_id"] == null) {
                    return [
                        "caracteristique_id" => $produit["caracteristique_id"],
                        "valeur" => $produit["valeur"]
                    ];
                }
                return [
                    "caracteristique_id" => $produit["caracteristique_id"],
                    "valeur" => $produit["valeur"],
                    "unite_id" => $produit["unite_id"]
                ];
            }, $productCaracts);
        }
        foreach ($caracterisques as $obj) {
            if (!in_array($obj, $productCaract)) {
                $diff[] = $obj;
            }
        }
        $product = [
            "libelle" => $request->libelle,
            "description" => $request->description ?? null,
            "code" => $request->code,
            "image" => $request->image ?? null,
            "marque_id" => $request->marque_id
        ];
        if ($productExist) {
            $newProduct = new ProduitResource($productExist);
            $productId = $productExist->id;
        } else {
            $newProduct = new ProduitResource(Produit::create($product));
            $productId = $newProduct->id;
            if (count($diff) != 0) {
                foreach ($caracterisques as $caracterisque) {
                    $caractProduit[] = [
                        "produit_id" => $productId,
                        "caracteristique_id" => $caracterisque["caracteristique_id"],
                        "valeur" => $caracterisque["valeur"],
                        "description" => $caracterisque["description"] ?? null,
                        "unite_id" => $caracterisque["unite_id"] ?? null
                    ];
                }
                $newProduitCaract = CaractProduit::insert($caractProduit);
            } else {
                $newProduitCaract = [];
            }
        }
        $produitSuccursale = [
            "prix_unitaire" => $request->prix_unitaire,
            "prix_promo" =>( ($request->prix_unitaire * 10) / 100 ),
            "quantite" => $request->quantite,
            "produit_id" => $productId,
            "succursale_id" => $request->succursale_id,
        ];
        $prodSuccExist = ProduitSuccrusale::getProductSucc($productId, $request->succursale_id)->first();
        if ($prodSuccExist) {
            $newProduitSuccursale = new ProduitSuccursaleResource($prodSuccExist);
            return $this->response(Response::HTTP_ACCEPTED, "Insertion impossible vous avez deja ce produit !", []);
        } else {
            $newProduitSuccursale = new ProduitSuccursaleResource(ProduitSuccrusale::create($produitSuccursale));
        }
        DB::commit();
        return $this->response(Response::HTTP_ACCEPTED, "Insertion réussie !", ["produit" => $newProduct, "produitSucc" => $newProduitSuccursale]);
    }

    public function searchProcuct($code)
    {
        $produit = Produit::getProduitByCode($code)->first();
        $succId = 1;
        if (!$produit) {
            return $this->response(Response::HTTP_ACCEPTED, "Aucun élément trouvé !", []);
        } else {
            $produitSucc = ProduitSuccrusale::getProductSucc($produit->id, $succId)->first();
            $amiIds = SuccursaleAmi::getAmi($succId)->pluck("ami_id");
            if ($produitSucc) {
                if ($produitSucc->quantite != 0) {
                    $newProduct = new ProduitResource($produit);
                    return $this->response(Response::HTTP_ACCEPTED, "Elément trouvé !", [$newProduct]);
                } else {
                    if (count($amiIds) != 0) {
                        foreach ($amiIds as $id) {
                            if ($exist = ProduitSuccrusale::getProductSucc($produit->id, $id)->first()) {
                                $produitAmis[] = $exist;
                            }
                        }
                        foreach ($produitAmis as $produit) {
                            if ($produit["quantite"] != 0) {
                                $produitAmisQte[] = new ProduitSuccursaleResource($produit);
                            }
                        }
                        return $this->response(Response::HTTP_ACCEPTED, "Voici les éléments de vos amis trouvés !", $produitAmisQte);
                    } else {
                        return $this->response(Response::HTTP_ACCEPTED, "Vous n'avez pas d'amis !", []);
                    }
                }
            }
            return $this->response(Response::HTTP_ACCEPTED, "Vous n'avez pas ce produit !", []);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return new ProduitResource($produit);
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
