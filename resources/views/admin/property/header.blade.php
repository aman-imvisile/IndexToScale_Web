<nav class="navbar navbar-default menu-page">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="{{url('admin/category/summary')}}">Summary</a></li>
			@foreach($maincategories as $categoryname)
			<li class="dropdown">
				@if(count($categoryname->subcategories) > 0)
					<a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">{{ $categoryname->main_category_name}} <i class="fa fa-angle-down"></i></a>
				@else
					<a href="javascript:void(0)">{{ $categoryname->main_category_name}}</a>
				@endif
				@if(count($categoryname->subcategories) > 0)
				<ul class="dropdown-menu">
					@foreach($categoryname->subcategories as $subcategoryname)
					<li><a href="{{url('admin/property/list/'.$categoryname->id.'/'.$subcategoryname->id)}}">{{ $subcategoryname->category_name}}</a></li>
					@endforeach
		    	</ul>
		    	@endif
           	</li>
           	@endforeach
		</ul>
	</div>
</nav>