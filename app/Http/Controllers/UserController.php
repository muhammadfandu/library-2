<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('search')){
            $users = User::where("title", "LIKE", "%{$request->get('search')}%")
                ->paginate(5);      
        }else{
		  $users = User::paginate(5);
        }
        return response($users);
    }
    public function store(Request $request)
    {
    	$input = $request->all();
        $create = User::create($input);
        return response($create);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response($user);
    }
    public function update(Request $request,$id)
    {
    	$input = $request->all();
        User::where("id",$id)->update($input);
        $user = User::find($id);
        return response($user);
    }
    public function destroy($id)
    {
        return User::where('id',$id)->delete();
    }
}

?>