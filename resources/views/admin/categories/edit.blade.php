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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('categories/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.categories')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.categories')}}">
												<a data-toggle="modal" data-target="#myModal{{$categories->id}}"
                                                   class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
                        <div class="modal fade" id="myModal{{$categories->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}}
                                        ({{$categories->id}}) ؟
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['categories.destroy', $categories->id]
                                        ]) !!}
                                        {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('categories')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.categories')}}">
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

                        <form action="{{aurl('/categories/'.$categories->id)}}"
                              class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data"
                              id="categories">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label">{{trans('admin.category')}}</label>
                                <div class="col-md-9">
                                    <input type="text" id="title" required name="title" value="{{ $categories->title }}" class="form-control"
                                           placeholder="{{trans('admin.category')}}"/>
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
		
