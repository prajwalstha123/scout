<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamMember
 * @package App
 */
class TeamMember extends Model
{

    /**
     * @var string
     */
    protected $table = 'team_members';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['f_name', 'm_name', 'l_name', 'dob', 'entry_date', 'position', 'passed_date', 'note', 'team_id' ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);

    }

    /**
     * @param $value
     * @return string
     */
    public function getDobAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['dob'] = $value;
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getEntryDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['entry_date'] = $value;
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getPassedDateAttribute($value)
    {
        if($value) {
            $value = explode('-', $value);
            $value = $value[2] . '/' . $value[1] . '/' . $value[0];
            return $this->attributes['passed_date'] = $value;
        }
    }

}
