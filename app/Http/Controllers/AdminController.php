<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Book;
use App\Borrow;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function user_peminjam(){
        $users = User::get();   
        return response($users);
    }
    public function pinjam_buku(){
        $books = Book::get();
        return response($books);
    }

    public function kembalikan($id){
        $borrows = Borrow::leftjoin('users','borrows.user_id','=','users.id')
        ->leftjoin('books','borrows.book_id','=','books.id')
        ->select('borrows.id', 'borrows.user_id', 'borrows.book_id', 'users.name', 'books.title', 'borrows.borrow_time', 'borrows.return_time', 'borrows.returned_time')
        ->where("borrows.id",$id)
        ->first();

        return response($borrows);
    }

    public function simpan_kembalikan(Request $request,$id){

        DB::select("UPDATE books SET stock = stock+1,borrowed = borrowed-1 WHERE id = '".$request->get('book_id')."'");
        $start = date("Y-m-d", strtotime($request->get('returned_time')));
        $input = array(
            "returned_time" => $start,
        );
        Borrow::where("id",$id)->update($input);
        $borrow = Borrow::find($id);

        return response($borrow);
    }
}

?>
