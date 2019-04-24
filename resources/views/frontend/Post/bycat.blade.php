@extends('frontend.layouts.layout')
@section('title')
@if(!empty($cat->cat_name))
{{$cat->cat_name}}
@endif
@endsection
@section('content')
<div class="wrapper">
    <!-- start page top -->
    <div class="page-top"
        style="background:url({{url('/')}}/website/images/slide5.jpg) center center / cover no-repeat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-name text-center">
                        <h1>@if(!empty($cat->cat_name))
                            {{$cat->cat_name}}
                            @endif</h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" breadcrumb-page">
                        <ul class="list-inline">
                            <li><a href="index.html"> <i class="fas fa-home"></i> <span>Home</span></a></li>
                            <li> <span>@if(!empty($cat->cat_name))
                                    {{$cat->cat_name}}
                                    @endif</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page top -->
    <!-- start contentpage -->
    <section class="content-page p-80 sec-all">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="cat-courses">
                        <div class="row">
                            @if(!empty($ShowPostByCat))
                            @foreach($ShowPostByCat as $get)
                            <div class="col-md-4 col-md-6">
                                <div class="courses">
                                    <div class="cor-img">
                                        <a
                                            href="{{url('/Details-Post')}}/{{$get->post_slogen}}">{{$get->post_title}}</a>
                                    </div>
                                    <div class="cor-info text-center">
                                        <p><strong>category :</strong><a href="{{url('/PostBy')}}/{{$get->slogen_cat}}">
                                                {{$get->cat_name}}</a></p>
                                        <a href="{{url('/Details-Post')}}/{{$get->post_slogen}}">
                                            <p class="description">
                                                {{$get->post_note}}
                                            </p>
                                        </a>
                                        <a href="{{url('/Details-Post')}}/{{$get->post_slogen}}" class="plus-more"> <i
                                                class="fas fa-plus"></i> show details</a>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination ">
                                {{ $ShowPostByCat->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 sticky">
                    <div class="sidebar">
                        <div class="side-info side-cat">
                            <div class="side-title">
                                <h4>Category</h4>
                            </div>
                            <ul class="list-unstyled">
                                @if(!empty($Category))
                                @foreach($Category as $get)
                                <li><a href="{{url('/PostBy')}}/{{$get->slogen_cat}}">
                                        @if(!empty($get->cat_name))
                                        {{$get->cat_name}}
                                        @endif
                                        <span> {{$get->post_count}} </span></a></li>
                                @endforeach
                                @endif
                            </ul>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- end contentpage -->

</div>
@endsection