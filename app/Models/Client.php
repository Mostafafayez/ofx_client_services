<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'client_name',
        'company_name',
        'mission', 'mission_ar',
        'vision', 'vision_ar',
        'about_us', 'about_us_ar',
        'additional_info',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }
}
