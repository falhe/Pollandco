<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model {

	/**
     * un points a un user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasOne('App\User');
    }

}
