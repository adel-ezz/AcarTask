@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $article->title }}</div>
                    <div class="card-body">
                        {!! $article->content !!}
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">Comments</div>
                    <div class="card-body">
                        @foreach($article->comments as $comment)
                            <div class="row">
                                <div class="col-md-4">
                                    {{ $comment->user->name }}
                                    <br>
                                    <span class="small">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                                </div>
                                <div class="col-md-8">
                                    {{ $comment->comment }}
                                </div>
                                <hr>
                            </div>
                        @endforeach
                        <hr>
                        <div class="clearfix"></div>
                        <div class="row">
                            <form action="{{ url('comment/Add') }}" method="post">
                                @csrf
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <textarea class="form-control" name="comment" placeholder="put your comment"
                                          required></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
