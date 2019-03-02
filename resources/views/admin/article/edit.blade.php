@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('article/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.article')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.article')}}">
												<a data-toggle="modal" data-target="#myModal{{$article->id}}"
                                                   class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
                        <div class="modal fade" id="myModal{{$article->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}}
                                        ({{$article->id}}) ؟
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['article.destroy', $article->id]
                                        ]) !!}
                                        {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('article')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.article')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="col-md-12">

                        <form action="{{aurl('/article/'.$article->id)}}" class="form-horizontal form-row-seperated"
                              method="post" enctype="multipart/form-data" id="article">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label">{{trans('admin.category')}}</label>
                                <div class="col-md-9">

                                    <select name="cat_id" required class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                            {{ $category->id == $article->cat_id ? 'selected':''}}
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label">{{trans('admin.title')}}</label>
                                <div class="col-md-9">
                                    <input type="text" id="title" name="title" value="{{ $article->title }}"
                                           class="form-control"
                                           placeholder="{{trans('admin.title')}}" required/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="content" class="col-md-3 control-label">{{trans('admin.content')}}</label>
                                <div class="col-md-9">
        <textarea id="content" class="form-control ckeditor" placeholder="{{trans('admin.content')}}"
                  name="content" required>{{$article->content }}</textarea>
                                </div>
                            </div>
                            <br>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="submit" class="btn btn-success"
                                                       value="{{ trans('admin.save') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop
		
