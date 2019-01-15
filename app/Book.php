<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Book extends Model
{
    public $fillable = ['title','description','writer','image','stock','borrowed'];
}

?>