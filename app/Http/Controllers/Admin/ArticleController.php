<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\ArticleDataTable;
use App\Model\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Article;

use Validator;
use Set;
use Up;
use Form;

class ArticleController extends Controller
{


    public function index(ArticleDataTable $article)
    {
        return $article->render('admin.article.index', ['title' => trans('admin.article')]);
    }


    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.article.create', ['title' => trans('admin.create'), 'categories' => $categories]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required'

        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.title'),
            'content' => trans('admin.contnet'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        Article::create($data);
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('article'));
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('admin.article.show', ['title' => trans('admin.show'), 'article' => $article]);
    }


    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::latest()->get();
        return view('admin.article.edit', ['title' => trans('admin.edit'), 'article' => $article, 'categories' => $categories]);
    }


    public function update($id)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required'

        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.'),
            'content' => trans('admin.'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        Article::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('article'));
    }


    public function destroy($id)
    {
        $article = Article::find($id);


        @$article->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $article = Article::find($id);

                @$article->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $article = Article::find($data);


            @$article->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }


}