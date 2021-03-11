<?php

namespace App\Models;

require "config/database.php";

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    public $timestamps = true;
}