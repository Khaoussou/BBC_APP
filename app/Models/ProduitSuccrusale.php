<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ProduitSuccrusale
 *
 * @property int $id
 * @property int $succursale_id
 * @property int $produit_id
 * @property float $prix_unitaire
 * @property float $prix_promo
 * @property int $quantite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produit $produit
 * @property-read \App\Models\Succursale $succursale
 * @method static Builder|ProduitSuccrusale getProductSucc($productId, $succId)
 * @method static Builder|ProduitSuccrusale newModelQuery()
 * @method static Builder|ProduitSuccrusale newQuery()
 * @method static Builder|ProduitSuccrusale query()
 * @method static Builder|ProduitSuccrusale whereCreatedAt($value)
 * @method static Builder|ProduitSuccrusale whereId($value)
 * @method static Builder|ProduitSuccrusale wherePrixPromo($value)
 * @method static Builder|ProduitSuccrusale wherePrixUnitaire($value)
 * @method static Builder|ProduitSuccrusale whereProduitId($value)
 * @method static Builder|ProduitSuccrusale whereQuantite($value)
 * @method static Builder|ProduitSuccrusale whereSuccursaleId($value)
 * @method static Builder|ProduitSuccrusale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProduitSuccrusale extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
    public function succursale(): BelongsTo
    {
        return $this->belongsTo(Succursale::class);
    }
    public function scopeGetProductSucc(Builder $builder, $productId, $succId)
    {
        return $builder->where(["produit_id" => $productId, "succursale_id" => $succId]);
    }
    
}
