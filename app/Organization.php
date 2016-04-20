<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Organizations
 * @package App
 */
class Organization extends Model
{

    /**
     * @var string
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = array('registration_no', 'district_id', 'registration_date', 'renew_status', 'type', 'name', 'chairman_f_name', 'chairman_l_name', 'chairman_mobile_no', 'tel_no', 'address_line_1', 'address_line_2', 'email', 'user_id', 'background_colour', 'border_colour');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams(){

        return $this->hasMany(Team::class);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(){
        return $this->hasMany(Member::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scouter()
    {
        return $this->hasMany(Scouter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function districts()
    {

        return $this->belongsTo(Districts::class);

    }

    /**
     * Accessor for Registration Date Attribute
     * @param $value
     * @return string
     */
    public function getRegistrationDateAttribute($value)
    {
        $value = explode('-', $value);
        $value = $value[2].'/'.$value[1].'/'.$value[0];
        return $this->attributes['registration_date'] = $value;
    }

}
