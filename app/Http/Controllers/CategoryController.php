<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function all()
    {
        $categories = Category::all();
        $categories = Category::paginate(3);
        // select id , name from category where id > 3 and id < 10
        // $categories = Category::select("id","name")->where("id" , ">" , 3)->where("id" , '<' ,10)->get();

        // // select id , name from category where id > 3 or id < 10
        // $categories = Category::select("id","name")->where("id" , ">" , 3)->orWhere("id" , '<' ,10)->get();

        // // select id , name from category where id > 3 or id < 10 order by id asc
        // $categories = Category::select("id","name")->where("id" , '<' ,10)->orderBy('id' , 'desc')->limit(3)->take(1)->get();

        // //select last one
        // $categories = Category::select("id","name")->orderBy('id' , 'desc')->limit(1)->get();

        // //select before last we can use offset or take()'
        // $categories = Category::select("id","name")->orderBy('id' , 'desc')->limit(1)->offset(1)->get();









        return view("Categories.all", compact("categories"));
    }
    public function show($id)
    {
        $category = Category::findOrfail($id);
        return view('Categories.show', compact('category'));
    }
    public function create()
    {
        return view("Categories.create");
    }
    public function store(Request $request)
    {
        #catch data
        // $name = $request->name ;
        // $desc = $request->desc ;
        #validate data
        # if this column that you validate same as in database
        # store this create in variable then pass to create
        $data = $request->validate(
            [
                "name" => "required|string|max:255",
                "desc" => "required",
                "image" => "required|mimes:png,jpg,jpeg"
            ]
        );

        // rename image
        //upload to my folder
        //you do overwrite
        $data['image'] = Storage::putFile("categories", $data['image']);


        #insert data
        Category::create(
            $data
            //     [
            //     "name"=>$name ,
            //     "desc"=>$desc ,
            // ]
        );

        #redirect
        ##from view method
        // $categories = Category::all();
        // return view('Categories.all' , compact("categories"));


        ##from redirect method
        // return redirect()->action([CategoryController::class , 'all']);

        ## another way with redirect

        // session()->put("success" , "Category added Succssfully ") ;
        session()->flash("success", "Category added Succssfully ");
        return redirect(url("categories"));
    }

    public function edit($id)
    {
        $category = Category::findOrfail($id);
        return view("Categories.edit", compact("category"));
    }

    public function update($id, Request $request)
    {
        //catch
        // $name = $request->input('name');
        // $desc = $request->input('desc');
        $image = $request->input('image');

        // validate
        $data = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "image" => "mimes:png,jpg,jpeg"
        ]);
        // if put new image (rename then move to our folder)
        $category = Category::findorfail($id);

        if($request->has('image')){
            Storage::delete($category->image);
            $data['image'] = Storage::putFile('categories' , $data['image']);
        }

        //update
        session()->flash("success", "Category Updated Succssfully ");
        $category->update($data);

        //or
        // $category = Category::findorfail($id);
        // $category->update();


        //redirect
        return redirect(url("categories/show/$id"));
    }


    public function delete($id, Request $request)
    {


        //check if exist
        $category = Category::findorfail($id);

        Storage::delete($category->image);
        //delete (delete data only not unlink image)
        $category->delete();

        // or
        // Category::findorfail($id)->delete();

        // redirect
        session()->flash("success", "Category Deleted Succssfully ");
        return redirect()->action([CategoryController::class, 'all']);
    }
}
