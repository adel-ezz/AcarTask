<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DataTables\CommentDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
use Set;
use Up;
use Form;

class CommentController extends Controller
{


    public function index(CommentDataTable $comment)
    {
        return $comment->render('resources/views.comment.index', ['title' => trans('admin.comment')]);
    }


    public function create()
    {
        return view('resources/views.comment.create', ['title' => trans('admin.create')]);
    }

    public function store()
    {
        $rules = [
            'comment' => 'required',
            'article_id'=>'required'
        ];
        $data = $this->validate(request(), $rules, [], [
            'comment' => trans('admin.comment'),

        ]);
        $data['user_id']=Auth::user()->id;
        Comment::create($data);
        session()->flash('success', trans('admin.added'));
        return redirect()->back();
    }


    public function show($id)
    {
        $comment = Comment::find($id);
        return view('resources/views.comment.show', ['title' => trans('admin.show'), 'comment' => $comment]);
    }



    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('resources/views.comment.edit', ['title' => trans('admin.edit'), 'comment' => $comment]);
    }

    public function update($id)
    {
        $rules = [
            '' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            '' => trans('admin.'),
        ]);
        Comment::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('comment'));
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);


        @$comment->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $comment = Comment::find($id);

                @$comment->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $comment = Comment::find($data);


            @$comment->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }


}