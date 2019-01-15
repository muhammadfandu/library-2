<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('search')){
            $books = Book::where("title", "LIKE", "%{$request->get('search')}%")
                ->paginate(5);      
        }else{
		  $books = Book::paginate(5);
        }
        return response($books);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $create = Book::create($input);
        return response($create);
    }
    public function edit($id)
    {
        $book = Book::find($id);
        return response($book);
    }
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $input = array(
            "description" => $request->get('description'),
            "stock"=> $request->get('stock'),
            "title"=> $request->get('title'),
            "writer" =>	$request->get('writer')
        );
        Book::where("id",$id)->update($input);
        $book = Book::find($id);
        return response($book);
    }
    public function destroy($id)
    {
        return Book::where('id',$id)->delete();
    }
}

?>