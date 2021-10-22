<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

//use phpDocumentor\Reflection\DocBlock\Tags\Author;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        return view('home.welcome', ['books' => $books, 'authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Author $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Author $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $authors)
    {
        //
    }
}
