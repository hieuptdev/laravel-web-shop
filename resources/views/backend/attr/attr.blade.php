@extends('backend.master.master')
@section('content')
@section('title','Quản trị - Thuộc tính')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh mục</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý thuộc tính</h1>
            @if (session('thongbao'))
            <div class="alert bg-{{ session('status') }}" role="alert">
                <svg class="glyph stroked checkmark">
                    <use xlink:href="#stroked-checkmark"></use>
                </svg>{{ session('thongbao') }}<a href="/admin/product/detail-attr" class="pull-right"><span
                        class="glyphicon glyphicon-remove"></span></a>
            </div>
            @endif
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach ($attrs as $row)
                    <div class="row magrin-attr">
                        <div class="col-md-2 panel-blue widget-left">
                            <strong class="large">{{ $row->name }}</strong>
                            <a onclick="return delAttr()" class="delete-attr" href="/admin/product/del-attr/{{ $row->id }}"><i
                                    class="fas fa-times"></i></a>
                            <a  class="edit-attr" href="/admin/product/edit-attr/{{ $row->id }}"><i
                                    class="fas fa-edit"></i></a>
                        </div>
                        <div class="col-md-10 widget-right boxattr">
                            @foreach ($row->values as $value)
                            <div class="text-attr">{{ $value->value }}
                                <a href="/admin/product/edit-value/{{ $value->id }}" class="edit-value"><i class="fas fa-edit"></i></a>
                                <a onclick="return delValue()" href="/admin/product/del-value/{{ $value->id }}" class="del-value"><i class="fas fa-times"></i></a>
                            </div>
                            @endforeach

                            {{-- <div class="text-attr"><a href="#" class="add-value"><i
                                        class="fas fa-plus-circle"></i></i></a></div> --}}

                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>

@stop
<script>
        function delAttr() {
            return confirm('Bạn muốn xoá thuộc tính này?');
        }
        function delValue() {
            return confirm('Bạn muốn xoá giá trị thuộc tính này?');
        }
    </script>