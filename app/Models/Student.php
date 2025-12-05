<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory; // @todo what is this for?
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // @todo what is this for?

// @todo what is the Student class?
// @todo what artisan command was used to create this class?
class Student extends Model
{
    // @todo: what is this for?
    use HasFactory;

    // This function defines a many-to-many relationship between the Student model and the Module model
    // @todo: what does this mean and how does it work?
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
}
