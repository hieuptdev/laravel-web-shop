@extends('backend.master.master')
@section('content')
@section('product')
	class="active"
@endsection
@section('title','Quản trị - Thêm biến thể')
<!--/. end sidebar left-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Biến thể</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Biến thể</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="col-md-12">
            @if (session('thongbao'))
            <div class="alert bg-{{ session('status') }}" role="alert">
                <svg class="glyph stroked checkmark">
                    <use xlink:href="#stroked-checkmark"></use>
                </svg>{{ session('thongbao') }}<a href="/admin/category" class="pull-right"><span
                        class="glyphicon glyphicon-remove"></span></a>
            </div>
            @endif
        <div class="panel panel-default">

            <form method="post">
                @csrf
                <div class="panel-heading" align='center'>
                    Giá cho từng biến thể sản phẩm : {{ $product->name }} ({{ $product->product_code }})
                </div>
                <div class="panel-body" align='center'>
                    <table class="panel-body">
                        <thead>
                            <tr>
                                <th width='33%'>Biến thể</th>
                                <th width='33%'>Giá (có thể trống)</th>
                                <th width='33%'>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->variant as $variant)
                            <tr>
                                <td scope="row">
                                    @foreach ($variant->values as $values)
                                  |  size : {{ $values->attribute->name }} : {{ $values->value }} |
                                    
                                    @endforeach
                                    
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="variant[{{$variant->id}}]" class="form-control" placeholder="Giá cho biến thể" value="">
                                    </div>
                                </td>
                                <td>
                                    <a onclick="return delVariant()" id="" class="btn btn-warning" href="/admin/product/del-variant/{{ $variant->id }}"
                                        role="button">Xoá</a>
    
                                </td>
    
                            </tr>
                            @endforeach
    
    
                        </tbody>
                    </table>
    
                </div>
                <div align='right'><button class="btn btn-success" type="submit"> Cập nhật </button> <a
                        class="btn btn-warning" href="/admin/product" role="button">Bỏ qua</a></div>
    
            </form>
        </div>
    </div>

</div>
@stop
<script>
    function delVariant() {
        return confirm('Bạn muốn xoá biến thể này?');
    }
</script>