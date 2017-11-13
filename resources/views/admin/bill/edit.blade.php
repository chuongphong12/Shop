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
      <a href="{{ route ('admin.bills.getList')}}">Danh sách đặt hàng </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Trình sửa đặt hàng</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="fProductDetail" >
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Thông tin đặt hàng</legend>
            <div class="control-group">
              <label class="control-label" for="typeahead">Tên khách hàng</label> 
              <div class="controls">
                <?php $cus = DB::table('customer')->where('id',$bills['id_customer'])->first(); ?>
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtCustomerName" value="{{ old('txtCustomerName',isset($cus) ? $cus->name : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Ngày đặt hàng</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtDate" value="{{ old('txtDate',isset($bills) ? $bills['date_order'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Tổng giá</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtTotal" value="{{ old('txtTotal',isset($bills) ? $bills['total'] :null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Thanh toán</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtPayment" value="{{ old('txtPayment',isset($bills) ? $bills['payment'] :null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Ghi chú</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtNote" value="{{ old('txtCost',isset($bills) ? $bills['note'] :null )}}">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Trạng thái</label>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoStatus" id="optionsRadios1" value="1"
                @if($bills['status'] == 1)
                  checked="checked"
                @endif> 
                Xong
                </label>
              </div>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoStatus" id="optionsRadios2" value="0"
                @if($bills['status'] == 0)
                  checked="checked"
                @endif> 
                Đang xử lý
                </label>
              </div>
              <div class="controls">
                <label class="radio" style="float: left;">
                  <input type="radio" name="rdoStatus" id="optionsRadios3" value="2"
                  @if($bills['status'] == 2)
                    checked="checked"
                  @endif>
                  Đã hủy
                </label>
              </div>
            </div>
          </fieldset>
          <hr>
          <fieldset>
            <legend style="font-size: 18px;">Thông tin chi tiết đơn hàng</legend>
               <form action="" class="form-group" >
                <fieldset>
      <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>Hình ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>                                           
            </tr>
          </thead>
          @foreach($bill_details as $item)   
          <tbody>
              <td style="width: 400px; ">
                <?php $ima = DB::table('products')->where('id',$item['id_product'])->first(); ?>
                <div class="controls" style="width: 300px;">
                        <img src="{{ asset('sources/image/product/'.$ima->image)}}">
                    </div>
                    </td>
            <td>
              <?php $pro = DB::table('products')->where('id',$item['id_product'])->first(); ?>
                @if(!empty ($pro->name))
                  {{ $pro->name }}
              @endif
            </td>
            <td>{{$item['quantity']}}</td>
            <td>{{number_format($item['unit_price'],0,',','.')}} VNĐ</td>                       
              </tbody>
                   @endforeach
              </table>
                </fieldset>
              </form>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Lưu đơn hàng</button>
              <button href="{{route('admin.bills.getList')}}" class="btn">Hủy</button>
            </div>
          </fieldset>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection