<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public function index(Request $request, $order_by = 'id')
    {
        $sorts = ['id' => 'id', 'name' => 'name'];
        $how = 'asc';

        if ($request->input('how')) {
            $how = $request->input('how');
        }

        $author = Author::orderBy($order_by, $how)->paginate(3);
        $author->withPath("author?order_by={$order_by}&&how={$how}");
        return view('author.index', ['authors' => $author, 'sorts' => $sorts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required']
        ]);
        $author = new Author();
        $author->fill(['name' => $request->input('name')]);
        $author->save();
        Session::flash('message', 'Author Added');
        return redirect('author/create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Author $author)
    {
        return view('author.show', compact('author'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.update', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $author->fill(['name' => $request->input('name')]);
        $author->save();
        Session::flash('message', 'Author Changed');
        return redirect(route('author.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Authors $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, Request $req)
    {
        $author->delete();
        Session::flash('message', 'Author Deleted');
        return redirect('/');
    }
}
