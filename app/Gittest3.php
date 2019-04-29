<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gittest3
 *
 * @package App
 * @property string $name
*/
class Gittest3 extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Gittest3::observe(new \App\Observers\UserActionsObserver);
    }
    
}
