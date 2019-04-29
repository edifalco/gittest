<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gittest4
 *
 * @package App
 * @property string $name
*/
class Gittest4 extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Gittest4::observe(new \App\Observers\UserActionsObserver);
    }
    
}
