<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homePage(Request $request){
        //dump($request);
        $search=$request->input("search");
        $query=Article::query();
        if($search){
            //dd( $search);
            $query->where("label", "like", "%" . $search . "%");
        }

        $articles=$query->paginate(6);
        //dd($articles->links());
       return view('home',compact('articles','search'));
    }


}
