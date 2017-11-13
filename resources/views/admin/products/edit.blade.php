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
      <a href="{{ route ('admin.products.getList')}}">Danh sách sản phẩm </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Trình sửa sản phẩm</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="fProductDetail" >
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Thông tin sản phẩm</legend>
            <div class="control-group">
              <label class="control-label" for="typeahead">Danh mục sản phẩm</label> 
              <div class="controls">
                <select data-placeholder="Lựa chọn danh mục"  data-rel="chosen" name="sltParent">
                  @foreach($cats as $type)
                    <option value="{{$type->id}}">
                      {{$type->name}}</option>           
                  @endforeach
                </select>
              </div>  
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Tên sản phẩm</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtProductName" value="{{ old('txtProductName',isset($product) ? $product['name'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Mô tả</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtDescription" value="{{ old('txtDescription',isset($product) ? $product['description'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Giá niêm yết</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit_price" value="{{ old('txtUnit_price',isset($product) ? $product['unit_price'] :null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Giá khuyến mãi</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPromotion_price" value="{{ old('txtPromotion_price',isset($product) ? $product['promotion_price'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Đơn vị</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit" value="{{ old('txtUnit',isset($product) ? $product['unit'] : null )}}">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Loại</label>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoNew" id="optionsRadios1" value="1"
                @if($product['new'] == 1)
                  checked="checked"
                @endif> 
                New Product
                </label>
              </div>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoNew" id="optionsRadios2" value="0"
                @if($product['new'] == 0)
                  checked="checked"
                @endif> 
                Normal
                </label>
              </div>
              <div class="controls">
                <label class="radio" style="float: left;">
                  <input type="radio" name="rdoNew" id="optionsRadios3" value="2"
                  @if($product['new'] == 2)
                    checked="checked"
                  @endif>
                  Top Product
                </label>
              </div>
            </div>
            <div class="control-group" >
              <label class="control-label">Hình ảnh hiện tại </label>
              <div class="controls" style="width: 26%;">
                <img src="{{ asset('sources/image/product/'.$product['image'])}}">
                <input type="hidden" name="img_current" value="{{ $product['image']}}">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hình ảnh sản phẩm</label>
              <div class="controls">
                <input type="file" name="fImages">
              </div>
            </div>
          </fieldset>
          <hr>
          <fieldset>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
              <button type="reset" class="btn">Hủy</button>
            </div>
          </fieldset>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection