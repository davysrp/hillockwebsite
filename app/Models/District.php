<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'districts';

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
                  'name_kh',
                  'name',
                  'province_id',
                  'updatedat'
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
     * Get the Province for this model.
     *
     * @return App\Models\Province
     */
    public function Province()
    {
        return $this->belongsTo('App\Models\Province','province_id','id');
    }

    /**
     * Get the communes for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function communes()
    {
        return $this->hasMany('App\Models\Commune','district_id','id');
    }

    /**
     * Get the products for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product','district_id','id');
    }

    /**
     * Set the updatedat.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedatAttribute($value)
    {
        $this->attributes['updatedat'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updatedat in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedatAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
