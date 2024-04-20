<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_address',
        'company',
        'job_title',
        'notes'
    ];
}
