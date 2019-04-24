@extends('frontend.layouts.layout')
@section('title')
@if(!empty($ShowPostsingle->post_title))
{{$ShowPostsingle->post_title}}
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
                        <h1>@if(!empty($ShowPostsingle->post_title))
                            {{$ShowPostsingle->post_title}}
                            @endif </h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" breadcrumb-page">
                        <ul class="list-inline">
                            <li><a href="index.html"> <i class="fas fa-home"></i> <span>Home</span></a></li>
                            <li> <span>@if(!empty($ShowPostsingle->post_title))
                                    {{$ShowPostsingle->post_title}}
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
            <div class="col-md-8">
                <div class="single-courses">
                    <div class="sg-info">
                        <h1>
                            @if(!empty($ShowPostsingle->post_title))
                            {{$ShowPostsingle->post_title}}
                            @endif
                        </h1>
                    </div>
                    <div class="description">
                        <p>
                            @if(!empty($ShowPostsingle->post_desc))
                            {!!$ShowPostsingle->post_desc!!}
                            @endif
                        </p>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="col-md-4 sticky">
                <div class="sidebar">
                    <div class="side-info">
                        <div class="side-title">
                            <h4><i class="far fa-clock"></i>
                                Category:
                                <a href="{{url('/PostBy')}}/@if(!empty($ShowPostsingle->slogen_cat)){{$ShowPostsingle->slogen_cat}}@endif">
                                    @if(!empty($ShowPostsingle->cat_name))
                                    {{$ShowPostsingle->cat_name}}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- end contentpage -->

</div>
@endsection