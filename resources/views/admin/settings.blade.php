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
                        <a href="{{aurl('settings')}}"
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
                        {!! Form::open(['url'=>aurl('/settings'),'id'=>'settings','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="form-group">
                            {!! Form::label('sitename_en',trans('admin.sitename_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('sitename_en',(setting('sitename_en') !== null ?setting('sitename_en'):''),['class'=>'form-control','placeholder'=>trans('admin.sitename_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="form-group">
                            {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('email',setting('email'),['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-6 col-lg-6">
                            {!! Form::label('logo',trans('admin.logo'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('logo',['class'=>'form-control','placeholder'=>trans('admin.logo')]) !!}
                                @if(!empty(setting('logo')))
                                    <img src="{{ it()->url(setting('logo')) }}" style="width:50px;height:50px"/>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            {!! Form::label('icon',trans('admin.icon'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('icon',['class'=>'form-control','placeholder'=>trans('admin.icon')]) !!}
                                @if(!empty(setting('icon')))
                                    <img src="{{ it()->url(setting('icon')) }}" style="width:50px;height:50px"/>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <br>
                        <br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop