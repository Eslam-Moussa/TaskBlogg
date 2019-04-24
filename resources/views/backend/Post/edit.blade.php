@extends('backend.layouts.layout')
@section('title')
تعديل المقال {{$post->post_title}}
@endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-12">
                <div class="col-md-7">
                    <div class="d-flex">
                        <ol class="breadcrumb m-b-10">
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية
                                </a></li>
                            <li class="breadcrumb-item"><a style="margin-left: 1px;"
                                    href="{{url('/admin/ShowPost')}}">المقال</a></li>
                            <li class="breadcrumb-item active">تعديل المقال ({{$post->post_title}})</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/Editpost/'.$post->id)}}" method="post"
                            enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group {{ $errors->has('cat_id') ? ' has-danger' : '' }}">
                                    <label>القسم<span style="color: red">*</span></label>
                                        <select class="select2 form-control custom-select" name="cat_id">
                                            <option value="">-- Please select --</option>
                                            @if(!empty($AllCat))
                                            @foreach($AllCat as $get)
                                            <option value="{{$get->id}}" @if($get->id == $post->cat_id)selected
                                                @endif >{{$get->cat_name}}</option>
                                            @endforeach
                                            @endif
                                            @if ($errors->has('cat_id'))
                                                <small class="form-control-feedback">{{ $errors->first('cat_id') }} </small>
                                                @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group {{ $errors->has('post_title') ? ' has-danger' : '' }}">
                                    <label for="wphoneNumber2">عنوان المقال <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" maxlength="15" name="post_title"
                                            value="{{$post->post_title}}">
                                            @if ($errors->has('post_title'))
                                        <small class="form-control-feedback">{{ $errors->first('post_title') }} </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group {{ $errors->has('post_note') ? ' has-danger' : '' }}">
                                    <label class="control-label">وصف مصغر <span style="color: red">*</span></label>
                                        <textarea class="form-control" rows="3" name="post_note"
                                            maxlength="135">@if(!empty($post->post_note)){{$post->post_note}}@endif</textarea>
                                            @if ($errors->has('post_note'))
                                        <small class="form-control-feedback">{{ $errors->first('post_note') }} </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group {{ $errors->has('post_desc') ? ' has-danger' : '' }}">
                                    <label for="wphoneNumber2">  وصف المقال <span style="color: red">*</span></label>
                                        <textarea id="mymce"
                                            name="post_desc">@if(!empty($post->post_desc)){{$post->post_desc}}@endif</textarea>
                                            @if ($errors->has('post_desc'))
                                        <small class="form-control-feedback">{{ $errors->first('post_desc') }} </small>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                    <a href="{{url('/')}}/admin/ShowPost"
                                        class="btn waves-effect  waves-light btn-outline-danger pull-right">
                                        <i class="fa fa-close"></i>
                                        <span>رجوع</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
</div>

@section('js')
<script>
    $(document).ready(function () {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });
</script>
@endsection
@endsection