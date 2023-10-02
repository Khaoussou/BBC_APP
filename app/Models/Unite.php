<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Unite
 *
 * @property int $id
 * @property string $libelle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Unite getUniteByLibelle($libelle)
 * @method static Builder|Unite newModelQuery()
 * @method static Builder|Unite newQuery()
 * @method static Builder|Unite query()
 * @method static Builder|Unite whereCreatedAt($value)
 * @method static Builder|Unite whereId($value)
 * @method static Builder|Unite whereLibelle($value)
 * @method static Builder|Unite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Unite extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function scopeGetUniteByLibelle(Builder $builder, $libelle)
    {
        return $builder->where("libelle", $libelle);
    }
}
