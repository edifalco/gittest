<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gittest2
 *
 * @package App
 * @property string $name
*/
class Gittest2 extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Gittest2::observe(new \App\Observers\UserActionsObserver);
    }
    
}
