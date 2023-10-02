<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Succursale
 *
 * @property int $id
 * @property string $nom
 * @property string $telephone
 * @property string $adresse
 * @property int|null $reduction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereReduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Succursale extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];
}
