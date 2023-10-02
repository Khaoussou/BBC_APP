<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\CaractProduit
 *
 * @property int $id
 * @property int $produit_id
 * @property int $caracteristique_id
 * @property int|null $unite_id
 * @property string|null $description
 * @property string $valeur
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Caracteristique $caracteristique
 * @property-read \App\Models\Produit $produit
 * @method static Builder|CaractProduit getCaractProduit($produitId)
 * @method static Builder|CaractProduit newModelQuery()
 * @method static Builder|CaractProduit newQuery()
 * @method static Builder|CaractProduit query()
 * @method static Builder|CaractProduit whereCaracteristiqueId($value)
 * @method static Builder|CaractProduit whereCreatedAt($value)
 * @method static Builder|CaractProduit whereDescription($value)
 * @method static Builder|CaractProduit whereId($value)
 * @method static Builder|CaractProduit whereProduitId($value)
 * @method static Builder|CaractProduit whereUniteId($value)
 * @method static Builder|CaractProduit whereUpdatedAt($value)
 * @method static Builder|CaractProduit whereValeur($value)
 * @mixin \Eloquent
 */
class CaractProduit extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function caracteristique(): BelongsTo
    {
        return $this->belongsTo(Caracteristique::class);
    }
    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
    public function scopeGetCaractProduit(Builder $builder, $produitId)
    {
        return $builder->where("produit_id", $produitId);
    }
}
