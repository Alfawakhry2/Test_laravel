<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    // //
    // public function all(){
    //     // echo "Hello From all ";

    //     ### three ways to take query string
    //     // return view("hello")->with(["fname"=>$fname , "lname"=>$lname]);
    //     // return view("hello" , compact("fname", "lname"));
    //     $posts = DB::table("posts")
    //     ->select()
    //     ->where("id" , ">" , 2)
    //     ->get();


    //     return view("hello" , compact("posts"));

    //     // $data = DB::table('users')->select("name");
    //     // $names = $data->get();

    //     // $alldata = $data->addSelect("email")->get();
    //     // dd($names);
    // }

    public function test()
    {
        // $arr = ['ahmed'  , 'said' , '     '];
        // $collect = collect($arr);
        // $collect = $collect->map(function($name){
        //     return strtoupper($name);
        // })->reject(function($name){
        //     return empty(trim($name));
        // });
        // dd($collect);
        // echo gettype($arr);
        // echo "<br>";
        // echo gettype($collect);

        //example 1
        // $users = collect([
        //     ['name' => 'Ali', 'age' => 24],
        //     ['name' => 'Mona', 'age' => 30],
        //     ['name' => 'said', 'age' => 28],
        //     ['name' => 'Ali', 'age' => 22],
        // ]);

        // $filter = $users->filter(fn($user)=>$user['age'] > 22)->pluck('name')->values();
        // dd($filter);

        //exmple 2
        // $products = collect([
        //     ['name' => 'TV', 'type' => 'electronics'],
        //     ['name' => 'Phone', 'type' => 'electronics'],
        //     ['name' => 'Jeans', 'type' => 'clothes'],
        //     ['name' => 'T-Shirt', 'type' => 'clothes'],
        //     ['name' => 'Laptop', 'type' => 'electronics'],
        // ]);

        // // $fil = $products->groupBy('type')->count(); // count of all type (with no repeatation)
        // $fil = $products->groupBy('type')->map(fn($group)=> $group->count()); // count of all type (with no repeatation)
        // dd($fil);


        //example 3 filter

        // $type = 'tv';
        // $products = collect([
        //     ['name' => 'Phone', 'price' => 1000],
        //     ['name' => 'TV', 'price' => 1500],
        //     ['name' => 'Laptop', 'price' => 2000],
        // ]);
        // //filter with type when here same as if (type) {filter}
        // $search  = $products->when($type , function($products , $type){
        //     return $products->filter(fn($item)=>str_contains(strtolower($item['name']) , strtolower($type)));
        // });


        // dd($search);


        //create collection macro , create your own function in collect
        ## we should add to serviceProvider , that can listen to whole app
        // Collection::macro('toUpper' , function(){
        //     return $this->map(function($item){
        //         return strtoupper($item);
        //     });
        // });


        $items= collect(['ahmed' , 'said' , 'khaled']);
        dd($items->toUpper());
    }
}
