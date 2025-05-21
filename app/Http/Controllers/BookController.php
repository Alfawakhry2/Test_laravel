<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class BookController extends Controller
{
    public function all()
    {
        $books = Book::paginate(2);
        return view("Books.all", compact("books"));
    }

    public function show($id)
    {
        $book = Book::findOrfail($id);
        return view("Books.show", compact("book"));
    }

    public function create()
    {
        $data = Category::all();
        return view("Books.create", ["data" => $data]);
    }
    public function store(Request $request)
    {
        //catch (with request class)
        //validate (with $request->validate([ ]))
        $data = $request->validate([
            'name' => "required|string|max:255",
            'desc' => "required|string|max:255",
            'small_desc' => "string|max:50",
            'image' => "required|image|mimes:png,jpg,jpeg",
            'price' => "required|numeric",
            'category_id' => "required|exists:categories,id",
        ]);
        $data['user_id'] = 3;
        // rename then move image
        $data['image'] = Storage::putFile("books", $data['image']);

        //insert Book::create()
        Book::create($data);

        //session to take errors
        session()->flash("success", "Book Added Successfully ");

        //redirect
        return redirect(url("books"));
    }

    public function edit($id)
    {
        $book = Book::findOrfail($id);
        $data = Category::all();

        return view("Books.edit", compact("book", "data"));
    }

    public function update($id, Request $request)
    {
        //catch
        //validate
        $book = Book::findOrfail($id);

        $data = $request->validate([
            'name' => "sometimes|required|string|max:255",
            'desc' => "required|string|max:255",
            'small_desc' => "string|max:50",
            'image' => "image|mimes:png,jpg,jpeg",
            'price' => "required|numeric",
            'category_id' => "required|exists:categories,id",
        ]);
        $data['user_id'] = 3;
        //if set new (delete , rename and move)
        if ($request->has('image')) {
            if ($book->image == null) {
                $data['image'] = Storage::putFile('books', $data['image']);
            } else {
                Storage::delete($book->image);
                $data['image'] = Storage::putFile('books', $data['image']);
            }
        }

        //update

        session()->flash("success", "Book Updated Succssfully ");
        $book->update($data);

        //redirec
        return redirect(url("books/show/$book->id"));
    }

    public function delete($id)
    {

        $book = Book::findOrfail($id);
        Storage::delete($book->image);
        $book->delete();

        session()->flash("success", "Book deleted ");
        return redirect(url("books"));
    }
}
