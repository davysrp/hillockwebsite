<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'results';

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
                  'label_id',
                  'type_id',
                  'dates',
                  'one_digit',
                  'two_digit',
                  'three_digit',
                  'status'
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
     * Get the label for this model.
     *
     * @return App\Models\Label
     */
    public function label()
    {
        return $this->belongsTo('App\Models\Label','label_id');
    }

    /**
     * Get the type for this model.
     *
     * @return App\Models\Type
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
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
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
