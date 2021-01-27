<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Awssat\Visits\Models\Visit;
class Articulo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vzt()
    {
        return visits($this);
    }
    
}
