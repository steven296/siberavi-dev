<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('custom.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $categories = Category::all();
            return view('categories.index', compact('categories'));

        }catch (\Exception $e) {
            return view('categories.index')->with('message', 'Acceso Denegado, No puedes Listar Datos !!!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        try{

            $category->to_store($request);
            return redirect()->route('categories.index');
        
        }catch (\Exception $e) {
            return view('categories.index')->with('message', 'Acceso Denegado, No puedes Guardar Datos !!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $category = Category::find($id);
            $category->to_update($request);
            return redirect()->route('categories.index');
        
        }catch (\Exception $e) {
            return view('categories.index')->with('message', 'Acceso Denegado, No puedes Actualizar Datos !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $category = Category::find($id);
            $category->delete();
            return redirect()->route('categories.index');

        }catch (\Exception $e) {
            return view('categories.index')->with('message', 'Acceso Denegado, No puedes Eliminar Datos !!!');
        }
    }
}
