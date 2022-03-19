<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'name_kh',
                  'category_id',
                  'type_id',
                  'commune_id',
                  'province_id',
                  'village_id',
                  'street',
                  'type_id',
                  'district_id',
                  'slug',
                  'code',
                  'price',
                  'view',
                  'description',
                  'map',
                  'remark',
                  'bath',
                  'livingroom',
                  'bedroom',
                  'parking',
                  'land_area',
                  'code',
                  'address',
                  'floor_number',
                  'status',
                  'photo'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the category for this model.
     *
     * @return App\Models\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Province','province_id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id');
    }
    public function commune()
    {
        return $this->belongsTo('App\Models\Commune','commune_id');
    }
    public function village()
    {
        return $this->belongsTo('App\Models\Village','village_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
/*    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }*/

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
/*    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }*/

}
