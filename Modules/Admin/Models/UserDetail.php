<?php

declare(strict_types=1);

namespace Modules\Admin\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use URL;

class UserDetail extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

     

   
    protected $guarded = ['created_at', 'updated_at', 'id'];

    // Return user record
    public function getUserDetail($id = null)
    {
        if ($id) {
            return User::find($id);
        }

        return User::all();
    }

    

    public function user()
    {
        return $this->belongsTo('Modules\Admin\Models\User', 'user_id');
    }
}
