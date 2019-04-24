@extends('backend.layouts.layout')
@section('title')
الأقسام
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
                            <li class="breadcrumb-item active">الأقسام</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">أضافة قسم</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/AddNewCat')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>اسم القسم</label>
                                        <input type="text" name="cat_name" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                    <i class="fa fa-check"></i>
                                    <span>حفظ</span>
                                </button>
                                <button type="button" data-dismiss="modal"
                                    class="btn waves-effect  waves-light btn-outline-danger">
                                    <i class="fa fa-close"></i>
                                    <span>اغلاق</span>
                                </button>
                            </div>
                        </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">تعديل القسم</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/EditCat')}}" method="post" enctype="multipart/form-data">
                            <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>اسم القسم</label>
                                            <input type="text" id="cat_name" name="cat_name" class="form-control"
                                                required="">
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id" class="form-control" value="">
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                        <i class="fa fa-check"></i>
                                        <span>حفظ</span>
                                    </button>
                                    <button type="button" data-dismiss="modal"
                                        class="btn waves-effect  waves-light btn-outline-danger">
                                        <i class="fa fa-close"></i>
                                        <span>اغلاق</span>
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <form action="{{url('/admin/multicatdelete')}}" method="post">
            {{csrf_field()}}
            <div class="container-fluid">

                <button data-toggle="modal" data-target="#myLargeModalLabel" type="button" class="btn btn-outline-info">
                    <i class="fa fa-plus"></i>
                    <span>اضافة قسم جديد</span>
                </button>


                <button onclick="return confirm('هل متاكد من الحذف')" type="submit"
                    class="btn btn-outline-danger waves-effect waves-light">
                    <i class="fa fa-trash-o"></i>
                    <span>حذف</span>
                </button>

                <br /><br />
                <!-- /.modal -->
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">الأقسام</h4>
                        <h6 class="card-subtitle">جدول بعرض جميع الأقسام المضافة ...</h6>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th></th>
                                        <th>#</th>
                                        <th>القسم</th>
                                        <th>الحاله</th>
                                        <th class="text-nowrap">التحكم</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>القسم</th>
                                        <th>الحاله</th>
                                        <th class="text-nowrap">التحكم</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(!empty($AllCat))
                                    @foreach($AllCat as $get)
                                    <tr>

                                        <td><input type="checkbox" name="multicatdelete[]" value="{{$get->id}}"></td>

                                        <td>{{$i++}}</td>
                                        <td>
                                            {{$get->cat_name}}
                                        </td>
                                        <td>
                                        @if($get->cat_status == 2)
                                                <span class="btn btn-dark btn-sm">موقوف</span>
                                                @elseif($get->cat_status == 1)
                                                <span class="btn btn-success btn-sm">مفعل</span>
                                                @endif
                                        </td>
                                        <td class="text-nowrap">

                                            <a data-id="{{$get->id}}" data-cat_name="{{$get->cat_name}}"
                                                data-target="#exampleModal" data-toggle="modal"
                                                data-original-title="تعديل"> <i
                                                    class="fa fa-pencil text-inverse m-r-10"></i> </a>


                                            <a href="{{url('/admin/deletesomecat/'.$get->id)}}"
                                                onclick="return confirm('هل تريد الحذف ! ')" title="حذف">
                                                <i class="fa fa-trash-o text-danger"></i> </a>

                                                <a href="{{url('/admin/unactivecat/'.$get->id)}}" title="وقف"><i class="fa fa-close text-dark"></i></a>


                                                <a href="{{url('/admin/activecat/'.$get->id)}}" title="تفعيل"><i class="fa fa-check text-success"></i></a>       

                                        </td>

                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    @section('js')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var cat_name = button.data('cat_name');
            var modal = $(this)
            modal.find('#id').val(id);
            modal.find('#cat_name').val(cat_name);
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' +
                                    group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                //            $('#example tbody').on('click', 'tr.group', function() {
                //                var currentOrder = table.order()[0];
                //                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                //                    table.order([2, 'desc']).draw();
                //                } else {
                //                    table.order([2, 'asc']).draw();
                //                }
                //            });
            });
        });
        //    $('#example23').DataTable({
        //        dom: 'Bfrtip',
        //        buttons: [
        //            'copy', 'csv', 'excel', 'pdf', 'print'
        //        ]
        //    });
    </script>

    @endsection
    @endsection