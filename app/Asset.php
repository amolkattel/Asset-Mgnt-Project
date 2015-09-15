<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['asset_name','description','department_id','location','status'];

    /**
     * Asset belongs to a department
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
