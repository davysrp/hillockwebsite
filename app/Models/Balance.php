<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'balances';

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
                  'ipaddress',
                  'topup_date',
                  'approve_date',
                  'approve_by',
                  'bank_id',
                  'bank_name',
                  'bank_number',
                  'amount',
                  'status',
                  'remark'
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
     * Get the approveBy for this model.
     *
     * @return App\Models\ApproveBy
     */
    public function approveBy()
    {
        return $this->belongsTo('App\Models\User','approve_by');
    }

    /**
     * Get the bank for this model.
     *
     * @return App\Models\Bank
     */
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank','bank_id');
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
