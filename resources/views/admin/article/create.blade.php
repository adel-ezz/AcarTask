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
                        <a href="{{aurl('article')}}"
                           class="btn btn-circle btn-icon-only btn-default"
                           tooltip="{{trans('admin.show_all')}}"
                           title="{{trans('admin.show_all')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen"
                           href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="col-md-12">
                        @if($categories->count() >0)
                            <form action="{{aurl('/article')}}" enctype="multipart/form-data"
                                  class="form-horizontal form-row-seperated" method="post" id="article">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="post">
                                <div class="form-group">
                                    <label for="title"
                                           class="col-md-3 control-label">{{trans('admin.category')}}</label>
                                    <div class="col-md-9">
                                        <select name="cat_id" required class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="title" class="col-md-3 control-label">{{trans('admin.title')}}</label>
                                    <div class="col-md-9">
                                        <input type="text" id="title" name="title" value="{{old('title')}}"
                                               class="form-control"
                                               placeholder="{{trans('admin.title')}}" required/>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="content"
                                           class="col-md-3 control-label">{{trans('admin.content')}}</label>
                                    <div class="col-md-9">
        <textarea id="content" class="form-control ckeditor" placeholder="{{trans('admin.content')}}"
                  name="content" required>{{old('content')}}</textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="submit" class="btn btn-success"
                                                           value="{{ trans('admin.add') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div>You don't have any Category please add one</div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop
	
