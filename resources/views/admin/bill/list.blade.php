@extends('master')
@section('content')
<ul class="breadcrumb">
<li>
	<i class="icon-home"></i>
	<a href="{{ url ('/')}}">Trang chủ</a> 
	<i class="icon-angle-right"></i>
</li>
</ul>
@include('admin.blocks.alerts')
<div class="row-fluid sortable">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="icon-th-list"></i><span class="break"></span>Danh mục sản phẩm</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th style="text-align: center;">STT</th>
				  <th>Tên khách hàng</th>
				  <th>Ngày đặt hàng</th>
				  <th>Tổng giá</th>
				  <th>Thanh toán</th>
				  <th>Ghi chú</th>
				  <th>Trạng thái</th>
				  <th style="text-align: center;">Chi tiết / Sửa</th>
			  </tr>
		  </thead>
		  <tbody>
		  	<?php $stt = 0;?>
		  	@foreach($data as $item)
		  	<?php $stt = $stt + 1;?>
			<tr>
				<td class="center" style="text-align: center;">{{ $stt }}</td>
				<td>
					<?php $cus = DB::table('customer')->where('id',$item['id_customer'])->first(); ?>
					@if(!empty ($cus->name))
						{{ $cus->name }}
					@endif
				</td>
				<td>{{$item['date_order']}}</td>
				<td>{{number_format($item['total'],0,',','.')}} VNĐ</td>
				<td>{{$item['payment']}}</td>
				<td>{{$item['note']}}</td>
				<td class="center">
						@if($item['status'] ==0)
							<span class="label label-warning">Đang xử lý</span>
						@elseif($item['status'] ==1)
							<span class="label label-success">Xong</span>
						@else 
							<span class="label label-danger" style="background: red;">Đã Hủy</span>
						@endif
					</td>
				<td class="center" style="text-align: center;">
					<a class="btn btn-success" href="{{URL::route('admin.bills.getDetail',$item['id'])}}">
						<i class="halflings-icon white zoom-in"></i>  
					</a>
					<a class="btn btn-info" href="{{URL::route('admin.bills.getEdit',$item['id'])}}">
						<i class="halflings-icon white edit"></i>  
					</a>
				</td>
			</tr>	
			@endforeach
		  </tbody>
	  </table>            
	</div>
</div><!--/span-->

</div><!--/row-->
@endsection