<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    // sets the primary key to id
    protected $primaryKey = 'id';
    // form fields that would be saved to database
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
}

// migration needed so that the database has a table to store the contact form submissions