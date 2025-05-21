<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function all(){
        // echo "Hello From all ";

        ### three ways to take query string
        // return view("hello")->with(["fname"=>$fname , "lname"=>$lname]);
        // return view("hello" , compact("fname", "lname"));
        $posts = DB::table("posts")
        ->select()
        ->where("id" , ">" , 2)
        ->get();


        return view("hello" , compact("posts"));

        // $data = DB::table('users')->select("name");
        // $names = $data->get();

        // $alldata = $data->addSelect("email")->get();
        // dd($names);
    }
}
