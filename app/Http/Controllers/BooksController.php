<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Auth;
use App\Books;
use App\Role;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->hasRole('admin')){
        $books = Books::all();

        foreach ($books as $book) {
            echo $book->id;
        }

        /*$books = array(
            array('id' => 1, 'title' => 'Book 1'),
            array('id' => 2, 'title' => 'Book 2'),
            array('id' => 3, 'title' => 'Book 3'),
            array('id' => 4, 'title' => 'Book 4')
        );*/

        /*return response()->json([
            'books' => $books
        ]);*/
        return view('books', ['books' => $books]);
      }
      else {
        return redirect('home')->with("status", "Vous n'etes pas autoriser à afficher cet page");

      }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
