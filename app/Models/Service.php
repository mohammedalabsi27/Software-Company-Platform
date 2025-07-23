<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'image', 'category_id', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function serviceRequests()
{
    return $this->hasMany(ServiceRequest::class);
}

}
