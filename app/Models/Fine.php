<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Fine extends Model
{
    use HasFactory;

    protected $fillable = ['lugar','fecha','hora','matricula','person_id','vehicle_id'];
    protected $allowIncluded = ['person','vehicle'];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    // Scope para incluir relaciones
    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

}
