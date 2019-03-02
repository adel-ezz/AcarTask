<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CategoriesDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Category;
use Validator;
use Set;
use Up;
use Form;


class Categories extends Controller
{

    public function index(CategoriesDataTable $categories)
    {
        return $categories->render('admin.categories.index', ['title' => trans('admin.categories')]);
    }



    public function create()
    {
        return view('admin.categories.create', ['title' => trans('admin.create')]);
    }


    public function store()
    {

        $rules = [
            'title' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.title'),
        ]);

        $data['admin_id'] = admin()->user()->id;
        Category::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect(aurl('categories'));
    }


    public function show($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.show', ['title' => trans('admin.show'), 'categories' => $categories]);
    }



    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', ['title' => trans('admin.edit'), 'categories' => $categories]);
    }



    public function update($id)
    {
        $rules = [
            'title' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.title'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        Category::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('categories'));
    }

    public function destroy($id)
    {
        $categories = Category::find($id);
        @$categories->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $categories = Category::find($id);

                @$categories->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $categories = Category::find($data);


            @$categories->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }


}