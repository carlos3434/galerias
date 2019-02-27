<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galerias';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['imagen_1', 'imagen_2', 'fecha'];

    public static $crules = [
        'fecha'       =>  'required|date_format:"m/d/Y',
        'imagen_1'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp',
        'imagen_2'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp'
    ];

}