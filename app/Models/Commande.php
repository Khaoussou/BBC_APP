<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Commande
 *
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property string $date
 * @property int|null $reduction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereReduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUserId($value)
 * @mixin \Eloquent
 */
class Commande extends Model
{
    use HasFactory;
    protected $guarded = [
        "id"
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($produit) {
            self::add($produit);
        });
        static::updating(function ($produit) {
            $produit->article()->detach();
            self::add($produit);
        });
    }
    protected static function add($produit)
    {
        $produits = request()->produits;
        $produit->produit_succursale()->attach($produits);
    }
    public function produit_succursale(): BelongsToMany
    {
        return $this->belongsToMany(ProduitSuccrusale::class, 'produit_commandes');
    }
    public function paiement(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }
}
