@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        @include('front.aside')
                    </div>
                </div>

            </div>
            <div class="col-md-9">
               @include('front.listofArticles')
            </div>

        </div>
    </div>
@endsection
