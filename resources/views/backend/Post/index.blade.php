@extends('backend.layouts.layout')
@section('title')
المقالات
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
                            <li class="breadcrumb-item"><a style="margin-left: 1px;" href="{{url('/admin')}}">الرئيسية </a></li>
                            <li class="breadcrumb-item active">المقالات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <form action="{{url('/admin/multitpostdelete')}}" method="post">
            <a href="{{url('/admin/Addpost')}}">
                <button  type="button" class="btn btn-outline-primary">
                    <i class="fa fa-plus"></i>
                    <span>اضافة مقال جديد</span>
                </button></a>
            <button onclick="return confirm('هل متاكد من الحذف')" type="submit" class="btn btn-outline-danger waves-effect waves-light">
                <i class="fa fa-trash-o"></i>
                <span>حذف</span>
            </button>
            <br/><br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">المقالات</h4>
                            <h6 class="card-subtitle">جدول بعرض جميع المقالات المضافة ....</h6>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>عنوان المقال</th>
                                            <th>القسم</th>
                                            <th>حالة النشر</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>عنوان المقال</th>
                                            <th>القسم</th>
                                            <th>حالة النشر</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @if(count($AllPost)>0)
                                        @foreach($AllPost as $get)
                                        <tr>
                                            {{csrf_field()}}
                                            <td><input type="checkbox" name="multitpostdelete[]" value="{{$get->id}}"></td>
                                            <td>{{$i++}}</td>
                                            <td><a href="{{url('/admin/Editpost/'.$get->id)}}">{{$get->post_title}}</a></td>
                                            <td>{{$get->cat_name}}</td>
                                            <td>
                                                @if($get->post_active == 2)
                                                <span class="btn btn-dark btn-sm">موقوف</span>
                                                @elseif($get->post_active == 1)
                                                <span class="btn btn-success btn-sm">مفعل</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="{{url('/admin/Editpost/'.$get->id)}}"> <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="tooltip" data-original-title="تعديل"> <i class="fa fa-edit"></i> </button></a>
                                                <a href="{{url('/admin/DeletePost/'.$get->id)}}"><button class="btn btn-danger  waves-effect waves-light" type="button" onclick="return confirm('هل تريد الحذف ! ')" data-toggle="tooltip" data-original-title="حذف"> <i class="fa fa-trash-o"></i> </button></a>
                                                <a href="{{url('/admin/unactivePost/'.$get->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-close"></i> وقف</a>
                                                <a href="{{url('/admin/activePost/'.$get->id)}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تفعيل</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td>عفوا لا يوجد معلومات</td>
                                            <td>عفوا لا يوجد معلومات</td>
                                            <td>عفوا لا يوجد معلومات</td>
                                            <td>عفوا لا يوجد معلومات</td>
                                            <td>عفوا لا يوجد معلومات</td>
                                            <td>عفوا لا يوجد معلومات</td>
                                        </tr>
                                        @endif 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

