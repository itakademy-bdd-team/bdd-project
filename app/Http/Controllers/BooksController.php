<?php

/**
 * Test PHP 7.0
 *
 * @category Empty
 * @package  Empty
 * @author   Mambot <richard_bollet@hotmail.fr>
 * @license  Private <http://private.mambot.io>
 * @link     <http://mambot.io>
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Books;
use App\Role;

/**
 * Test PHP 7.0
 *
 * @category Empty
 * @package  Empty
 * @author   Mambot <richard_bollet@hotmail.fr>
 * @license  Private <http://private.mambot.io>
 * @link     <http://mambot.io>
 */
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Books::all();

        return view('books', ['books' => $books]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            $book = new Books;
            return view('edit', compact('book'));
        } else {
            return redirect(route('books.index'))->with("status", "Vous n'etes pas autoriser à afficher cet page");

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Books::create([
            'isbn' => Input::get('isbn'),
            'title' => Input::get('title'),
            'author' => Input::get('author'),
            'summary' => Input::get('summary'),
            'publisher' => Input::get('publisher'),
            'year' => Input::get('year'),
        ]);
        return redirect(route('books.index'))->with("status",'Book created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::findOrFail($id);

        return view('show-books', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Auth::user()->hasRole('admin')){
          $book = Books::findOrFail($id);
          return view('edit', compact('book'));
      } else {
          return redirect(route('books.index'))->with("status", "Vous n'etes pas autoriser à afficher cet page");
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Books::findOrFail($id);
        $book->update($request->all());
        return redirect(route('books.index'))->with("status", 'Book modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->hasRole('admin')) {
            $books = Books::findOrFail($id);
            Books::destroy($id);
            return redirect(route('books.index'));
        } else {
            return redirect(route('books.index'))->with("status", "Vous n'etes pas autoriser à afficher cet page");
        }
    }
    
}
