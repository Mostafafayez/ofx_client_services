<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['client_id', 'email', 'whatsapp'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
