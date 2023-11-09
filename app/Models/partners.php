<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partners extends Model
{
    use HasFactory;
    protected $fillable = [
        "img_path","describtion","visit_our_website","view_company_profile",
        "facebook_link","whatsApp_link","viber_link", "instagram_link",
    ] ;
    
}
