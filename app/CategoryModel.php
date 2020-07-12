<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    protected $fillable=['parent_id','name','description','status','image'];

}
