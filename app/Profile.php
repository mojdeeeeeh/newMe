<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public $appends = [
        'profile_url'
    ];

    /**
     * Retrun profile profile url
     *
     * @return     <type>  The profile url attribute.
     */
    public function
    getProfileUrlAttribute ()
    {
        return \Storage::url($this->filename);
    }


    /**
     * Delete record
     */
    public function
    deleteRecord ()
    {
        \Storage::delete ($this->filename);

        $this->delete ();

        return true;
    }
}
