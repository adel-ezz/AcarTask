@if(isset($articles))
    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a class="link" href="{{ url('article/'.$article->id.'/'.$article->title) }}">{{ str_limit($article->title,20,'...') }}</a></div>
                    <div class="card-body">
                        {!!  str_limit($article->content,40,'...') !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <hr>
    {!! $articles->links() !!}
@endif