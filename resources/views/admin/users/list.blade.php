@extends('master')
@section('content')
<ul class="breadcrumb">
  <li>
      <i class="icon-home"></i>
      <a href="{{ url ('/')}}">Trang chủ</a>
      <i class="icon-angle-right"></i> 
  </li>
  <li>
	 <i class="icon-plus-sign"></i>
	 <a href="{{URL::route('admin.users.getAdd')}}">Thêm mới thành viên </a>
  </li>
</ul>
<div class="row-fluid sortable">		
<div class="box span12">
	@include('admin.blocks.alerts')
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon white user"></i><span class="break"></span>Danh sách tài khoản</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form method="get">
			<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
				  	  <th style="text-align: center;">STT</th>
					  <th>Tên tài khoản</th>
					  <th>Thời gian đăng ký</th>
					  <th>Level</th>
					  <th>Trạng thái</th>
					  <th>Chi tiết / Sửa / Xóa</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	<?php $stt=0;?>
			  	@foreach($user as $user_item)
			  	<?php 
			  		$stt = $stt +1;
			  	?>
				<tr>
					<td style="text-align: center;">{{ $stt}}</td>
					<td>{{ $user_item['full_name']}}</td>
					<td class="center">
						<?php 
							echo \Carbon\Carbon::createFromTimeStamp(strtotime($user_item['created_at']))->diffForHumans()
						?>
					</td>
					<td class="center">
						@if( ($user_item['level'] == 1) && ($user_item['id'] ==1) )
							<span class="label label-warning">SuperAdmin</span>
						@elseif($user_item['level'] == 1)
							<span class="label label-info">Admin</span>
						@else
							Member
						@endif
					</td>
					<td class="center">
						@if($user_item['status'] ==1)
							<span class="label label-success">Hoạt động</span>
						@else 
							<span class="label label-danger" style="background: red;">Đã khóa</span>
						@endif
					</td>
					<td class="center">
						<a class="btn btn-success" href="{{route('admin.users.getDetail',$user_item['id'])}}">
							<i class="halflings-icon white zoom-in"></i>  
						</a>
						<a class="btn btn-info" href="{{ route('admin.users.getEdit',$user_item['id'])}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a onclick="return xacnhanxoa('Bạn có muốn xóa không ?')"  class="btn btn-danger" href="{{ route('admin.users.getDelete',$user_item['id'])}}">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				@endforeach
			  </tbody>
		  </table>    
		</form>        
	</div>
</div><!--/span-->

</div><!--/row-->
@endsection