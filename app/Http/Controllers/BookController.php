<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $sorts = ['id'=>'id','title'=>'title'];
        $order_by = 'id';
        $how = 'asc';
        if ($request->input("order_by")) {
            $order_by = $request->input('order_by');
        }

        if ($request->input('how')) {
            $how = $request->input('how');
        }

        $book = Book::orderBy($order_by, $how)->paginate(3);
        $book->withPath("book?order_by={$order_by}&&how={$how}");
        return view('book.index', ['books' => $book,'sorts'=>$sorts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Book $book)
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name' => ['required'],
            'authors' => ['required']
        ]);
        $book = new Book();

        $book->fill(['name' => $request->input('name')]);
        $book->save();
        $book->authors()->attach($request->input('authors'));
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $authors = $book->authors->pluck('id', 'name')->toArray();
        return view('book.show', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $belongauthors = $book->authors->pluck('id', 'name')->toArray();
        return view('book.update', ['book' => $book, 'authors' => $authors, 'belongs' => $belongauthors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => ['required'],
            'authors' => ['required']
        ]);
        $book->update(['name' => $request->input('name')]);
        $book->authors()->sync($request->input('authors'));
        return redirect()->route('book.index',['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Books $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, Book $book)
    {
        $book->delete();
        return redirect('/');

    }
}
