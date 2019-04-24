@extends('frontend.layouts.layout')
@section('title')
Home
@endsection
@section('content')

    <section class="feat-courses p-80">
        <div class="container">
            <div class="sec-title text-center">
                <h2> Category </h2>
                <div class="line"></div>
            </div>
            <div class="row">
            @if(!empty($ShowCat)) 
             @foreach($ShowCat as $get)
                <div class="col-md-3 col-sm-6">
                    <div class="serviceBox">
                        <div class="service-icon"><i class="fas fa-code"></i></div>
                        <h3 class="title">
                        @if(!empty($get->cat_name))
                        {{$get->cat_name}}
                        @endif
                        </h3>
                        <a href="{{url('/PostBy')}}/{{$get->slogen_cat}}" class="plus-more"> <i class="fas fa-plus"></i> show post</a>
                    </div>
                </div>
                @endforeach 
               @endif
            </div>
        </div>
    </section>
   
    <section class="last-courses p-80">
        <div class="container">
            <div class="sec-title text-center">
                <h2>All Post</h2>
                <div class="line"></div>
            </div>
            <div class="row">
            @if(!empty($ShowPost))
             @foreach($ShowPost as $get)
                <div class="col-md-3 col-sm-6">
                    <div class="courses"> 
                        <div class="cor-img">
                            <a href="{{url('/Details-Post')}}/{{$get->post_slogen}}">{{$get->post_title}}</a>
                        </div>
                        <div class="cor-info text-center">
                            <p><strong>category :</strong><a href="{{url('/PostBy')}}/{{$get->slogen_cat}}"> {{$get->cat_name}}</a></p>
                            <a href="{{url('/Details-Post')}}/{{$get->post_slogen}}">
                                <p class="description">
                                {{$get->post_note}}
                                  </p>
                            </a>
                            <a href="{{url('/Details-Post')}}/{{$get->post_slogen}}" class="plus-more"> <i class="fas fa-plus"></i> show details</a>
                        </div>

                    </div>
                    
                </div>
                @endforeach
                    @endif 
            </div>
        </div>
    </section>
@endsection