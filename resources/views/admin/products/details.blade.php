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
  <a href="{{ route('admin.products.getList')}}">Danh sách sản phẩm </a>
  <i class="icon-angle-right"></i>
</li>
<li>
	<i class="icon-plus-sign"></i>
	<a href="{{URL::route('admin.products.getAdd')}}">Thêm mới sản phẩm </a>
</li>
</ul>
<div class="row-fluid sortable">	
<div class="box span12">
	<div class="box-header">
		<h2 id="txtName"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="break"></span>Thông tin chi tiết sản phẩm : {{ old('txtName',isset($data) ? $data['name'] : nul)}}</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		<fieldset>
			<table class="table table-bordered table-striped table-condensed">
				  <thead>
					  <tr>
						  <th>Tên sản phẩm</th>
						  <th>Mô tả</th>
						  <th>Giá niêm yết</th>
						  <th>Giá khuyến mãi</th>
						  <th>Đơn vị</th>                                            
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td id="txtName">{{ old('txtName',isset($data) ? $data['name'] : null)}}</td>
						<td class="center" id="txtDescription">{{ old('txtDescription',isset($data) ? $data['description'] : null)}}</td>
						<td class="center" id="txtUnit_price">{{ number_format(old('txtUnit_price',isset($data) ? $data['unit_price'] : null),0,',','.')}}</td>
						<td class="center" id="txtPromotion_price">{{ number_format(old('txtPromotion_price',isset($data) ? $data['promotion_price'] : null),0,',','.')}}</td>
						<td id="txtUnit">{{ old('txtUnit',isset($data) ? $data['unit'] : null)}}</td>  
				  </tbody>
			 </table>  
		 	<form action="" class="form-group" >
            <fieldset>
	            <legend style="font-size: 18px;"></legend>
	            <legend  style="width: 25%;font-size: 14px;text-align: center;">Hình ảnh sản phẩm</legend>
	            <div class="controls" style="width: 26%;margin-top: 5px;">
	                <img src="{{ asset('sources/image/product/'.$data['image'])}}">
	            </div>
            </fieldset>
          </form>
		</fieldset>

	</div>
</div><!--/span-->
</div><!--/row-->
@endsection