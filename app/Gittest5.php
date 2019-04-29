<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gittest5
 *
 * @package App
 * @property string $name
*/
class Gittest5 extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Gittest5::observe(new \App\Observers\UserActionsObserver);
    }
    
}
