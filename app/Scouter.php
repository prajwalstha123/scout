<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Scouter
 * @package App
 */
class Scouter extends Model
{

    /**
     * @var string
     */
    public $timestamps = false;

    protected $fillable = ['name', 'permission', 'permission_date', 'btc_no', 'btc_date', 'advance_no', 'advance_date', 'alt_no', 'alt_date', 'lt_no', 'lt_date', 'is_lead', 'email', 'organization_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizations(){

        return $this->belongsTo(Organizations::class, 'organization_id');

    }

    public function getPermissionDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['permission_date'] = $value;
        }
    }

    public function getBtcDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['btc_date'] = $value;
        }
    }

    public function getAdvanceDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['advance_date'] = $value;
        }
    }

    public function getAltDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['alt_date'] = $value;
        }
    }

    public function getLtDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['lt_date'] = $value;
        }
    }

}
