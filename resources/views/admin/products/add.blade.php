@extends('master')
@section('content')
<ul class="breadcrumb">
  <li>
      <i class="icon-home"></i>
      <a href="{{ url ('/')}}">Trang chủ</a>
      <i class="icon-angle-right"></i> 
  </li>
  <li>
      <i class="fa fa-th" aria-hidden="true"></i>
      <a href="{{route('admin.products.getList')}}">Danh sách sản phẩm </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Thêm mới sản phẩm</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="{{ route('admin.products.getAdd')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Thông tin sản phẩm</legend>
            <div class="control-group">
              <label class="control-label" for="typeahead">Danh mục sản phẩm</label> 
              <div class="controls">
                <select data-placeholder="Lựa chọn danh mục"  data-rel="chosen" name="sltParent">
                  @foreach($cats as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>            
                  @endforeach
                </select>
              </div>  
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Tên sản phẩm</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtProductName" value="{!! old('txtProductName') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Mô tả</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtDescription" value="{!! old('txtDescription') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Giá niêm yết</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit_price" value="{!! old('txtUnit_price') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Giá khuyến mãi</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPromotion_price" value="{!! old('txtPromotion_price') !!}">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hình ảnh sản phẩm</label>
              <div class="controls">
                <input type="file" name="fImages" value="{!! old('fImages') !!}">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Đơn vị</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit" value="{!! old('txtUnit') !!}">
                </div>
            </div>
          </fieldset>
          <hr>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <button type="reset" class="btn">Hủy</button>
          </div>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection