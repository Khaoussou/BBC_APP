<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Marque
 *
 * @property int $id
 * @property string $libelle
 * @property int $numero
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Marque getMarqueByLibelle($libelle)
 * @method static Builder|Marque newModelQuery()
 * @method static Builder|Marque newQuery()
 * @method static Builder|Marque query()
 * @method static Builder|Marque whereCreatedAt($value)
 * @method static Builder|Marque whereId($value)
 * @method static Builder|Marque whereLibelle($value)
 * @method static Builder|Marque whereNumero($value)
 * @method static Builder|Marque whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Marque extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function scopeGetMarqueByLibelle(Builder $builder, $libelle)
    {
        return $builder->where("libelle", $libelle);
    }
}
