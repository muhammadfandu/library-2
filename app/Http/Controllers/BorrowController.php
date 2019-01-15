<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Borrow;
use App\Book;
use DB;

class BorrowController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('search')){
            $borrows = Borrow::leftjoin('users','borrows.user_id','=','users.id')
                ->leftjoin('books','borrows.book_id','=','books.id')
                ->select('borrows.id', 'users.name', 'books.title', 'borrows.borrow_time', 'borrows.return_time', 'borrows.returned_time')
                ->where("title", "LIKE", "%{$request->get('search')}%")
                ->orderBy('borrows.id', 'desc')
                ->paginate(5);      
        }else{
		  $borrows = Borrow::leftjoin('users','borrows.user_id','=','users.id')
          ->leftjoin('books','borrows.book_id','=','books.id')
          ->select('borrows.id', 'users.name', 'books.title', 'borrows.borrow_time', 'borrows.return_time', 'borrows.returned_time')
          ->orderBy('borrows.id', 'desc')
          ->paginate(5);   
        }
        return response($borrows);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $date = date("Y-m-d H:i:s", strtotime("+7 days"));
        $data = array(
            'user_id' => $request->get('user_id'),
            'book_id' => $request->get('book_id'),
            'return_time' => $date,
        );

        DB::select("UPDATE books SET stock = stock-1,borrowed = borrowed+1 WHERE id = '".$request->get('book_id')."'");

        $create = Borrow::create($data);
        return response($create);
    }
    public function edit($id)
    {
        $borrow = Borrow::find($id);
        return response($borrow);
    }
    public function update(Request $request,$id)
    {
    	$input = $request->all();
        Borrow::where("id",$id)->update($input);
        $borrow = Borrow::find($id);
        return response($borrow);
    }
    public function destroy($id)
    {
        return Borrow::where('id',$id)->delete();
    }
}

?>