<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;


class Work extends Model
{
    /** @use HasFactory<\Database\Factories\WorkFactory> */
    use HasFactory;

    public function employer():BelongsTo {
        return $this->belongsTo(Employer::class);
    }

    public static array $expirience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function jobApplication():HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplies(Authenticatable|User|int $user):bool{
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplication',
                fn($query) => $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters):Builder | QueryBuilder{
        return $query->when($filters['search'] ?? null, function($query, $search){
           $query->where(function($query) use ($search){
             $query->where('title', 'like', '%'.  $search . '%')
                ->orWhere('description', 'like', '%'. $search . '%')
                ->orWhereHas('employer', function($query) use ($search){
                    $query->where('company_name', 'like' , '%' . $search . '%'); 
                });
           });
        })->when($filters['min_salary'] ?? null, function($query, $minSalary){
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function($query, $maxSalary){
            $query->where('salary', '>=', $maxSalary);
        })->when($filters['expirience'] ?? null, function($query, $expirience){
            $query->where('expirience', '=', $expirience);
        })->when($filters['category'] ?? null, function($query, $category){
            $query->where('category', '=', $category);
        });

    }
}
