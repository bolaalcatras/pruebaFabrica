<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['name','modelo','person_id'];
    protected $allowIncluded = ['person','fines','accidents'];

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

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function fines(){
        return $this->hasMany(Fine::class);
    }

    public function accidents(){
        return $this->belongsToMany(Accident::class);
    }
}
