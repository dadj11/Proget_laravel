<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany ;
use Illuminate\Database\Eloquent\Casts\Attribute ;
class Article extends Model
{
    //

    public $timestamps=false;

    public function label(): Attribute{
          return Attribute::make(
             get:fn (string $value )=>ucfirst($value),
             set:fn (string $value )=>$value,
          );
    }

    public function categorie():BelongsTo
    {
        return $this->belongsTo(Categorie::class );
    }


    public function orders():BelongsToMany
    {

    return $this->belongsToMany(Order::class,'order_lines');
    }

     protected $fillable=[
        'label',
        'quantite',
        'current_price',
        'description',
        'categorie_id',
        //'slug',
        'cover'];
}
