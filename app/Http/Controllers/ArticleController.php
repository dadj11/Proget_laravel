<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     public static function middleware(): array
    {
        return [
            new Middleware('permission:article.view', only: ['index','show']),
            new Middleware('permission:article.create', only: ['create','store']),
            new Middleware('permission:article.update', only: ['edit','update']),
            new Middleware('permission:article.delete', only: ['destroy']),

        ];
    }
    public function index()
    {
        //
        $articles = Article::all();
        $page_title = 'liste des articles';

        return view('articles.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categorie::all();
        $page_title = 'article';

        return view('articles.create', compact('categories', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'label' => 'required|string|unique:articles,label,|min:3',
            'quantite' => 'required|integer|min:1',
            'current_price' => 'required|numeric|min:0',
            'description' => 'nullable|min:10',
            'cover_fild' => 'mimes:jpg,jpeg',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $slug = Str::slug($request->input('label'), '-');
        $cover_aplload_file = $request->file('cover_fild');
        //  dd($cover_aplload_file->getClientOriginalName());
        // dump($cover_aplload_file->getClientOriginalExtension());
        //  dd($cover_aplload_file->extension());
        $cover_file_name = $slug.'.'.$cover_aplload_file->extension();
        $cover_path = $cover_aplload_file->storeAs('Article_covers', $cover_file_name,'public');

        //  dd($cover_path);
        //  dd($validated_data);
        Article::create([
            'label' => $request->input('label'),
            'quantite' => $request->input('quantite'),
            'current_price' => $request->input('current_price'),
            'description' => $request->input('description'),
            'categorie_id' => $request->input('categorie_id'),
            // 'slug'=>$slug,
            'cover' => $cover_path,
        ]);

        return redirect()->route('admin.articles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        // dd($article);
        return view('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        $categories = Categorie::all();

        return view('articles.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //

        $validated_data = $request->validate([
            'label' => 'required|string|min:3',
            'quantite' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|min:10',
            'categorie' => 'required|exists:categories,id',
            'cover_fild' => 'mimes:jpg,png,jpeg',
        ]);

        $cover_path = '';
        if (isset($validated_data['cover_fild'])) {
            $cover_path = $validated_data['cover_fild'];
            if (isset($article->cover)){
            Storage::disk('public')->delete($article->cover);}
            $slug = Str::slug($request->input('label'), '-');
        $cover_aplload_file = $request->file('cover_fild');
        $cover_file_name = $slug.'.'.$cover_aplload_file->extension();
        $cover_path = $cover_aplload_file->storeAs('Article_covers', $cover_file_name,'public');



        } else {
            $cover_path = $article->cover;
        }

        $article->update([
            'label' => $request->input('label'),
            'quantite' => $request->input('quantite'),
            'current_price' => $request->input('prix'),
            'description' => $request->input('description'),
            'categorie_id' => $request->input('categorie'),
            'cover' => $cover_path,
        ]);

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        if (isset($article->cover)){
          Storage::disk('public')->delete($article->cover);
        }


        return redirect()->route('admin.articles.index');
    }
}
