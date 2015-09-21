<?php

namespace App;

use App\Http\Requests\AssetRequest;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assets';

    protected $dates = ['date_acquired', 'date_disposed'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_no',
        'name',
        'description',
        'model',
        'serial',
        'purchase_price',
        'barcode',
        'date_acquired',
        'date_disposed',
        'category_id',
        'department_id',
        'vendor_id',
        'employee_id',
        'location_lat',
        'location_long',
        'image',
        'status',
    ];

    /**
     * scope query with filter options
     * @param  query $query
     * @return Query
     */
    public static function scopeFilter($query)
    {
        if($name = \Request::get('q'))
        {
            $query->where('name', 'like', "%{$name}%");
            $query->orWhere('asset_no', 'like', "%{$name}%");
            $query->orWhere('model', 'like', "%{$name}%");
        }
        
        if($category_id = \Request::get('category_id'))
        {
            $query->where('category_id', '=', $category_id);
        }
        
        if($department_id = \Request::get('department_id'))
        {
            $query->where('department_id', '=', $department_id);
        }
        
        if($vendor_id = \Request::get('vendor_id'))
        {
            $query->where('vendor_id', '=', $vendor_id);
        }
        
        if($status = \Request::get('status'))
        {
            $query->where('status', '=', $status);
        }

        return $query;
    }
    /**
     * save image to folder and name to db
     * @param  AssetRequest $request
     * @return void
     */
    public function saveImage(AssetRequest $request)
    {
        if(! $request->file('image')) return null;
        $uploadPath = '/images/assets/';

        $imageName = $this->id . '.' . 
            $request->file('image')->getClientOriginalExtension();

        $imagePath = base_path() . '/public' . $uploadPath;
        $request->file('image')->move($imagePath, $imageName);
        $this->update(
            ['image' => $uploadPath.$imageName]
        );
    }
    /**
     * date_acquired attribute in yyyy-mm-dd format
     * @return string
     */
    public function getDateAcquiredAttribute()
    {
        return date('Y-m-d', strtotime($this->attributes['date_acquired']));
    }

    /**
     * date_disposed attribute in yyyy-mm-dd format
     * @return string
     */
    public function getDateDisposedAttribute()
    {
        $disposed_time = strtotime($this->attributes['date_disposed']);
        if($disposed_time <= 0) return null;
        
        return date('Y-m-d', $disposed_time);
    }

    /**
     * Asset belongs to a department
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Asset belongs to a category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Asset belongs to a vendor
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    /**
     * Asset belongs to a employee
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
