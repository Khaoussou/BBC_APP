<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SuccursaleAmi
 *
 * @property int $id
 * @property int $succursale_id
 * @property int $ami_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|SuccursaleAmi getAmi($succId)
 * @method static Builder|SuccursaleAmi newModelQuery()
 * @method static Builder|SuccursaleAmi newQuery()
 * @method static Builder|SuccursaleAmi query()
 * @method static Builder|SuccursaleAmi whereAmiId($value)
 * @method static Builder|SuccursaleAmi whereCreatedAt($value)
 * @method static Builder|SuccursaleAmi whereId($value)
 * @method static Builder|SuccursaleAmi whereSuccursaleId($value)
 * @method static Builder|SuccursaleAmi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SuccursaleAmi extends Model
{
    use HasFactory;

    protected $guarded = [
        "id"
    ];
    public function scopeGetAmi(Builder $builder, $succId)
    {
        return $builder->where("succursale_id", $succId);
    }

    public static function friedns($id)
    {
        return DB::table("succursale_ami")
            ->where('succursale_id', $id)
            ->orWhere('ami_id', $id)
            ->get();
    }
    
}
