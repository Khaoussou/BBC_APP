<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Produit
 *
 * @property int $id
 * @property string $libelle
 * @property string $code
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property int $marque_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CaractProduit> $produitCaract
 * @property-read int|null $produit_caract_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProduitSuccrusale> $produitSuccursale
 * @property-read int|null $produit_succursale_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Succursale> $succursale
 * @property-read int|null $succursale_count
 * @method static Builder|Produit getProduitByCode($code)
 * @method static Builder|Produit getProduitByLibelle($libelle)
 * @method static Builder|Produit newModelQuery()
 * @method static Builder|Produit newQuery()
 * @method static Builder|Produit query()
 * @method static Builder|Produit whereCode($value)
 * @method static Builder|Produit whereCreatedAt($value)
 * @method static Builder|Produit whereDescription($value)
 * @method static Builder|Produit whereId($value)
 * @method static Builder|Produit whereImage($value)
 * @method static Builder|Produit whereLibelle($value)
 * @method static Builder|Produit whereMarqueId($value)
 * @method static Builder|Produit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Produit extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];
    public function produitSuccursale(): hasMany
    {
        return $this->hasMany(ProduitSuccrusale::class);
    }
    public function succursale(): BelongsToMany
    {
        return $this->belongsToMany(Succursale::class, "produit_succrusales");
    }
    public function produitCaract(): HasMany
    {
        return $this->hasMany(CaractProduit::class);
    }
    public function scopeGetProduitByCode(Builder $builder, $code)
    {
        return $builder->where("code", $code);
    }
    public function scopeGetProduitByLibelle(Builder $builder, $libelle)
    {
        return $builder->where("libelle", $libelle);
    }
}
