<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;


    protected $fillable = ['client_id', 'reference_detail'];
    public $timestamps = false;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
