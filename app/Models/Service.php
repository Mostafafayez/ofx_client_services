<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'service_name', 'service_name_ar', 'description', 'description_ar'];
    public $timestamps = false;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
