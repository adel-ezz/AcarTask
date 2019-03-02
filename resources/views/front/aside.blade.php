<div class="menu">
    @foreach(category() as $category)
        <a class="link" href="{{ url('category/'.$category->id.'/'.$category->title) }}">{{ $category->title}}</a>
    @endforeach
</div>