<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'description','reward'];

    public function category(){
        return $this->belongsTo(Category::class);
    }


    // basice commandes 
  /* composer require --dev barryvdh/laravel-ide-helper
   composer require rebing/graphql-laravel

   artisan vendor:publish --provider="Rebing\\GraphQL\\GraphQLServiceProvider"
    
   ./vendor/bin/sail down 
   ./vendor/bin/sail artisan make:model -m Category */

}
