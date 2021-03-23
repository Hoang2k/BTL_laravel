@extends('admin.master')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('update.Product')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên:</strong>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mô tả</strong>
                    <textarea class="form-control" style="height:50px" name="description" value="{{$product->description}}"
                        placeholder="Nhập Mô tả"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá</strong>
                    <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm"
                        value="{{$product->price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá khuyến mại</strong>
                    <input type="number" name="price_sale" class="form-control" placeholder="Nhập giá khuyến mại"
                        value="{{$product->price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Danh mục</strong>
                    <select class="form-control" value="" name="category_id" id="">
                                      <option value="">---</option>
                                      @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->name}}</option>
                                     @endforeach
                                      </select>  
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="submit" class="btn btn-danger">Trở lại</button>
            </div>
        </div>

    </form>
@endsection