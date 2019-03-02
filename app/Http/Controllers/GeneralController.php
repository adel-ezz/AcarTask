<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    function index(){
        return view('welcome');
    }

    function articlesForCategory($id)
    {
        $category=Category::find($id);
        if ($category)
        {
            $articles=Article::where('cat_id',$category->id)->paginate(10);
            return view('welcome',compact('articles'));

        }
        return redirect()->back();
    }
    function article($id)
    {
        $article=Article::find($id);
        if ($article)
        {
            return view('front.single',compact('article'));
        }
        return view('welcome');
    }
}
