<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categorie::all();
        $page_title = 'liste des categories';

        return view('categories.index', compact('categories', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // $label= $request->input("label");
        // $description=$request->input('description');
        // $categorie= new Categorie();
        // $categorie->label=$label;
        // $categorie->description=$description;
        // $categorie->slug=Str::slug($label, '-');
        // $categorie->save();

        $validate = $request->validate([
            'label' => 'required|unique:categories|min:3',
            'description' => 'nullable|min:10',
        ]

        );

        Categorie::create(
            [
                'label' => $request->input('label'),
                'description' => $request->input('description'),
                'slug' => Str::slug($request->input('label'), '-'),

            ]
        );

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $category)
    {
        //
        dump($category);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $category)
    {
        //
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $category)
    {
        //

        $validate = $request->validate([
            'label' => [
                'required',
                Rule::unique('categories')->ignore($category->id), 'min:3'],
            'description' => 'nullable|min:10',
        ]

        );
        $category->update(
            [
                'label' => $request->input('label'),
                'description' => $request->input('description'),
                'slug' => str::slug($request->input('label'), '-'),
            ]
        );

        return redirect()->route('admin.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $category)
    {  //
        $category->delete();

        return redirect()->route('admin.categories.index');

    }
}
