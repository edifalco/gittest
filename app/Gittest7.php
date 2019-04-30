<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gittest7
 *
 * @package App
 * @property string $name
*/
class Gittest7 extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Gittest7::observe(new \App\Observers\UserActionsObserver);
    }
    
}
