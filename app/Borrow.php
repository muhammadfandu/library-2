<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Borrow extends Model
{
    public $fillable = ['user_id','book_id','borrow_time','return_time','returned_time'];
}

?>