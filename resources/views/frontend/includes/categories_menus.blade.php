<ul class="nav navbar-nav nav_1">
                    {{--!!$categories_nested!!--}}{{--use with atayahmet/laravel-nestable--}}

                    <ul class="nav navbar-nav nav_1">
                    @foreach ($categories as $category)
                    	<li>
                    		<a href="{{url('/prodcuts?category='.$category->id)}}">{{$category->title}}</a>
                    	</li>
                    @endforeach
                    </ul><!--end of nav-->