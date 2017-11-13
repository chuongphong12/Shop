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
  <a href="{{ route('admin.products.getList')}}">Danh sách đặt hàng </a>
  <i class="icon-angle-right"></i>
</li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header">
		<h2 id="txtName"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="break"></span>Thông tin chi tiết đơn hàng</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		<fieldset>
			<table class="table table-bordered table-striped table-condensed">
				  <thead>
					  <tr>
						<th>Tên khách hàng</th>
				  		<th>Ngày đặt hàng</th>
				  		<th>Tổng giá</th>
				  		<th>Thanh toán</th>
				  		<th>Ghi chú</th>
				  		<th>Trạng thái</th>                                        
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>
							<?php $cus = DB::table('customer')->where('id',$data['id_customer'])->first(); ?>
							@if(!empty ($cus->name))
									{{ $cus->name }}
							@endif
						</td>
						<td>{{$data['date_order']}}</td>
						<td>{{number_format($data['total'],0,',','.')}} VNĐ</td>
						<td>{{$data['payment']}}</td>
						<td>{{$data['note']}}</td>
						<td class="center">
						@if($data['status'] ==0)
							<span class="label label-warning">Đang xử lý</span>
						@elseif($data['status'] ==1)
							<span class="label label-success">Xong</span>
						@else 
							<span class="label label-danger" style="background: red;">Đã Hủy</span>
						@endif
						</td>                           
				  </tbody>
			 </table>  
		 	<form action="" class="form-group" >
            <fieldset>
	            <legend style="font-size: 18px;"></legend>
	            <legend  style="width: 100%;font-size: 20px;text-align: center;">Chi tiết đơn hàng</legend>
	                <div class="control-group" >
	                
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
				  @foreach($detail as $item)   
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
	              </div>
            </fieldset>
          </form>
	</div>
</div><!--/span-->
</div><!--/row-->
@endsection