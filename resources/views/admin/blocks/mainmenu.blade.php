<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="{{ route('admin.pages.survey')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>		
			<li><a href="{{route('admin.users.getList')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span class="hidden-tablet"> Quản lý thành viên</span></a></li>
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-refresh fa-5x" aria-hidden="true"></i>
				<span class="hidden-tablet"> Cập nhật sản phẩm</span></a>
				<ul>
					<li><a class="submenu" href="{{route('admin.cats.getList')}}"><i class="fa fa-braille" aria-hidden="true" ></i><span class="hidden-tablet"> Danh mục sản phẩm</span></a></li>
					<li><a class="submenu" href="{{ route('admin.products.getList')}}"><i class="fa fa-product-hunt" aria-hidden="true"></i><span class="hidden-tablet"> Sản phẩm</span></a></li>
				</ul>	
			</li>
			<li><a href="{{route('admin.bills.getList')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i><span class="hidden-tablet"> Đặt Hàng</span></a></li>
			<li><a href="{{ route ('admin.pages.form')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
			<li><a href="{!! route('admin.pages.tables') !!}"><i class="icon-align-justify"></i><span class="hidden-tablet">Quản lý danh mục</span></a></li>
			<li><a href="{!! route('admin.pages.calendar') !!}"><i class="icon-calendar"></i><span class="hidden-tablet"> Lịch</span></a></li>
		</ul>
	</div>

</div>
<!-- end: Main Menu -->