<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProduitCommande
 *
 * @property int $id
 * @property int $produit_succrusale_id
 * @property int $commande_id
 * @property float $prix_vente
 * @property int|null $reduction
 * @property int $qte_commande
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereCommandeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande wherePrixVente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereProduitSuccrusaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereQteCommande($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereReduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCommande whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProduitCommande extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];
}
