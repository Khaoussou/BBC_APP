<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Caracteristique
 *
 * @property int $id
 * @property string $libelle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique query()
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caracteristique whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Caracteristique extends Model
{
    use HasFactory;
    
    protected $guarded = [
        "id"
    ];

    public function scopeGetValueCaract(Builder $builder ,$idCaract)
    {
        return $builder->where("id", $idCaract);
    }
}
