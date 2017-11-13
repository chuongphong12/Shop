@extends('home')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Product Detail</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a>  / <span>{{$product->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							@if($product->promotion_price!=0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="sources/image/product/{{$product->image}}" alt="" height="250px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$product->name}}</h2></p>
								<p class="single-item-price">
									@if($product->promotion_price==0)
										<span class="flash-sale">{{number_format($product->unit_price)}}</span>
									@else
										<span class="flash-del">{{number_format($product->unit_price)}}</span>
										<span class="flash-sale">{{number_format($product->promotion_price)}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$product->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<p></p>
								<select class="wc-select" name="color">
									<option>Quantity</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('addcart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$product->description}}</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							<div class="owl-carousel owl-theme">
							@foreach($related as $re)
							<div class="col-sm-12">
								<div class="single-item">
									@if($re->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">
										<a href="{{route('sanpham',$re->id)}}"><img src="sources/image/product/{{$re->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$re->name}}</p>
										<p class="single-item-price">
											@if($re->promotion_price==0)
										<span class="flash-sale">{{number_format($re->unit_price)}}</span>
									@else
										<span class="flash-del">{{number_format($re->unit_price)}}</span>
										<span class="flash-sale">{{number_format($re->promotion_price)}}</span>
									@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('sanpham',$re->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="owl-carousel owl-theme">
								@foreach($top_product as $top)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('sanpham',$top->id)}}"><img src="sources/image/product/{{$top->image}}" alt=""></a>
									<div class="media-body">
										{{$top->name}}</br>
										@if($top->promotion_price==0)
										<span class="flash-sale">{{number_format($top->unit_price)}}</span>
									@else
										<span class="flash-del">{{number_format($top->unit_price)}}</span>
										<span class="flash-sale">{{number_format($top->promotion_price)}}</span>
									@endif
									</div>
								</div>
								@endforeach
							</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="owl-carousel owl-theme">
								@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('sanpham',$new->id)}}"><img src="sources/image/product/{{$new->image}}" alt=""></a>
									<div class="media-body">
										{{$new->name}}</br>
										@if($new->promotion_price==0)
										<span class="flash-sale">{{number_format($new->unit_price)}}</span>
									@else
										<span class="flash-del">{{number_format($new->unit_price)}}</span>
										<span class="flash-sale">{{number_format($new->promotion_price)}}</span>
									@endif
									</div>
								</div>
								@endforeach
							</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection