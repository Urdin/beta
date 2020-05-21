<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

     //public $timestamps = false;
     //const CREATED_AT = 'name_of_created_at_column';
     //const UPDATED_AT = 'name_of_updated_at_column';

     public $timestamps = false;
   
     /*
     const CREATED_AT = 'creation_date';
     const UPDATED_AT = 'last_update';
     */

     protected $fillable = ['name', 'structure'];

}
