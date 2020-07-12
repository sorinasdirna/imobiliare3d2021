<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    //protected $fillable=['categories_id','p_name','p_code','p_color','description','price','image'];
    protected $fillable=[
        'categories_id',
        'p_type',
        'p_name',
        'p_code',
        'p_status',
        'image',
        'p_description',
        'p_price',
        'p_pricemp2',
        'p_currency',
        'p_negotiable',
        'p_rooms',
        'p_baths',
        'p_balconies',
        'p_hallways',
        'p_typeof',
        'p_furniture',
        'p_material',
        'p_floor',
        'p_totalfloors',
        'p_totalsurface',
        'p_usablesurface',
        'p_year',
        'p_condition',
        'p_cadastre',
        'p_tabulate',
        'p_address',
        'p_addresslat',
        'p_addresslon',
        'p_neighborhood',
        'p_seokeys',
        'p_seodescription',
        'p_clientname',
        'p_clientphone',
        'p_clientaddress',
        'p_clientdescription'
    ];

    public function category(){
        return $this->belongsTo(CategoryModel::class,'categories_id','id');
    }
    //public function attributes(){
    //    return $this->hasMany(ProductAtrrModel::class,'products_id','id');
    //}
}
