@extends('frontend.master');
@section('content')
	<!-- hero section -->
	<section id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- featured post large -->
                        <div class="post featured-post-lg">
                            <div class="details clearfix">
                                <h2 class="post-title"><a href="{{ route('banner.blog', $banners->first()->id) }}">{{ $banners->first()->banner_title }}</a></h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $banners->first()->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $banners->first()->created_at}}</li>
                                </ul>
                            </div>
                            <a href="{{ route('banner.blog', $banners->first->id) }}">
                                <div class="thumb rounded">
                                    <div class="inner data-bg-image" data-bg-image="{{ asset('uploads/banner/') }}/{{ $banners->first()->banner_photo }}"></div>
                                </div>
                            </a>
                        </div>
				</div>
				<div class="col-lg-4">

					<!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>
							<!-- popular posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
								<!-- post -->
                                @foreach ($latest_populars->take(4) as $popular)
                                <div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="{{ route('single.trending.page', $popular->id) }}">
											<div class="inner">
												<img style="width: 60px; height:60px; border-radius:50%;" src="{{ asset('uploads/blog/') }}/{{ $popular->popular_photo }}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{ route('single.trending.page', $popular->id) }}">{!! $popular->popular_title !!}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{ $popular->created_at->format('d M Y') }}</li>
										</ul>
									</div>
								</div>
                                @endforeach
								<!-- post -->
							</div>
							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
								<!-- post -->
                                @foreach ($blog_recents as $blog_recent)
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="{{ route('single.blog.page', $blog_recent->id) }}">
											<div class="inner">
												<img style="width: 60px; height:60px; border-radius:50%;" src="{{ asset('uploads/blog/') }}/{{ $blog_recent->blog_image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{ route('single.blog.page', $blog_recent->id) }}">{!! $blog_recent->blog_title !!}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{ $blog_recent->created_at->format('d M Y') }}</li>
										</ul>
									</div>
								</div>
                                @endforeach
								<!-- post -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Editor’s Pick</h3>
						<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
                            <!-- post -->
                            <div class="col-sm-6">
                                @foreach ($blogs->take(1) as $blog)
								<div class="post">
									<div class="thumb rounded">
										<a href="{{ route('category.show', $blog->rel_to_category->id) }}" class="category-badge position-absolute">{{ $blog->rel_to_category->category_name }}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{ route('single.blog.page', $blog->id) }}">
											<div class="inner">
												<img src="{{ asset('uploads/blog/') }}/{{ $blog->blog_image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img style="width:40px; height:40px; border-radius:50%;" src="{{ asset('uploads/user/') }}/{{ $blog->rel_to_user->photo }}" class="author" alt="author"/>{{ $blog->rel_to_user->name }}</a></li>
										<li class="list-inline-item">{{ $blog->created_at }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{ route('single.blog.page', $blog->id) }}">{{ $blog->blog_title }}</a></h5>
                                    @if (strlen($blog->blog_desp) > 80)
                                    <p class="excerpt mb-0">{{ substr($blog->blog_desp, 0, 80).'..' }}</p>
                                    @endif
								</div>
                                @endforeach
							</div>
                            <!-- post -->
							<div class="col-sm-6">
								@foreach ($editor_list->take(4) as $blog)
                                <div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="{{ route('single.blog.page', $blog->id) }}">
											<div class="inner">
												<img style="width: 70px; height:80px" src="{{ asset('uploads/blog/')}}/{{ $blog->blog_image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{ route('single.blog.page', $blog->id) }}">{!! $blog->blog_title !!}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{ $blog->created_at }}</li>
										</ul>
									</div>
								</div>
                                @endforeach
								<!-- post -->
							</div>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- horizontal ads -->
					<div class="ads-horizontal text-md-center">
						<span class="ads-title">- Sponsored Ad -</span>
						<a href="#">
							<img src="{{asset('frontend')}}/assets/images/ads/ad-750.png" alt="Advertisement" />
						</a>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Trending</h3>
						<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							<div class="col-sm-6">
								<!-- post large -->
                                @foreach ($populars->take(1) as $popular)
                                <div class="post">
									<div class="thumb rounded">
										<a href="{{ route('category.show', $popular->rel_to_category->id) }}" class="category-badge position-absolute">{{ $popular->rel_to_category->category_name }}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{ route('single.trending.page', $popular->id) }}">
											<div class="inner">
												<img style="width: 100%; height:400px;" src="{{ 'uploads/blog/' }}/{{ $popular->popular_photo }}" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">

										<li class="list-inline-item"><a href="#"><img style="width: 50px; height:50px; border-radius:50%;" src="{{ asset('uploads/user') }}/{{ $popular->rel_to_user->photo }}" class="author" alt="author"/>{{ $popular->rel_to_user->name }}</a></li>
										<li class="list-inline-item">{{ $popular->created_at->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{ route('single.trending.page', $popular->id) }}">{{ $popular->popular_title }}</a></h5>
                                    @if (strlen($popular->popular_desp) > 200)
                                    <p class="excerpt mb-0">{{ substr($popular->popular_desp, 0, 200).'..' }}</p>
                                    @endif
								</div>
                                @endforeach
								<!-- post -->
                                @foreach ($popular_two->take(2) as $popular)
								<div class="post post-list-sm square before-seperator">
									<div class="thumb rounded">
										<a href="{{ route('single.trending.page', $popular->id) }}">
											<div class="inner">
												<img src="{{ 'uploads/blog/' }}/{{ $popular->popular_photo }}" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{ route('single.trending.page', $popular->id) }}">{{ $popular->popular_title }}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{ $popular->created_at->format('d M Y') }}</li>
										</ul>
									</div>
								</div>
                                @endforeach
								<!-- post -->
							</div>
							<div class="col-sm-6">
								<!-- post large -->
                                @foreach ($popular_three->take(1) as $popular)
								<div class="post">
									<div class="thumb rounded">
										<a href="{{ route('category.show', $popular->rel_to_category->id) }}" class="category-badge position-absolute">{{ $popular->rel_to_category->category_name }}</a>
										<span class="post-format">
											<i class="icon-earphones"></i>
										</span>
										<a href="{{ route('single.trending.page', $popular->id) }}">
											<div class="inner">
												<img style="width: 100%; height:400px;" src="{{ 'uploads/blog/' }}/{{ $popular->popular_photo }}" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img style="width: 50px; height:50px; border-radius:50%;"  src="{{ asset('uploads/user/') }}/{{ $popular->rel_to_user->photo }}" class="author" alt="author"/>{{ $popular->rel_to_user->name }}</a></li>
										<li class="list-inline-item">{{ $popular->created_at->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{ route('single.trending.page', $popular->id) }}">{{ $popular->popular_title }}</a></h5>
									@if (strlen($popular->popular_desp) > 200)
                                    <p class="excerpt mb-0">{{ substr($popular->popular_desp, 0, 200).'..' }}</p>
                                    @endif
								</div>
                                @endforeach
                                @foreach ($popular_four->take(2) as $popular)
                                <!-- post -->
								<div class="post post-list-sm square before-seperator">
									<div class="thumb rounded">
										<a href="{{ route('single.trending.page', $popular->id) }}">
											<div class="inner">
												<img src="{{ 'uploads/blog/' }}/{{ $popular->popular_photo }}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{ route('single.trending.page', $popular->id) }}">{!! $popular->popular_title !!}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{ $popular->created_at->format('d M Y') }}</li>
										</ul>
									</div>
								</div>
								<!-- post -->
                                @endforeach
							</div>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Inspiration</h3>
						<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
						<div class="slick-arrows-top">
							<button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
							<button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
						</div>
					</div>

					<div class="row post-carousel-twoCol post-carousel">
						<!-- post -->
                        @foreach ($blogs as $blog)
                        <div class="post post-over-content col-md-6">
							<div class="details clearfix">
								<a href="{{ route('category.show', $blog->rel_to_category->id) }}" class="category-badge">{{ $blog->rel_to_category->category_name }}</a>
								<h4 class="post-title"><a href="{{ route('single.blog.page', $blog->id) }}">{!! $blog->blog_title !!}</a></h4>
								<ul class="meta list-inline mb-0">
									<li class="list-inline-item"><a style="color: #fff;" href="#">{{ $blog->rel_to_user->name }}</a></li>
									<li style="color: #fff;" class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
								</ul>
							</div>
							<a href="{{ route('single.blog.page', $blog->id) }}">
								<div class="thumb rounded">
									<div class="inner">
										<img style="width: 100%; height:400px;" src="{{ asset('uploads/blog/') }}/{{ $blog->blog_image }}" alt="thumb" />
									</div>
								</div>
							</a>
						</div>
                        @endforeach
						<!-- post -->
					</div>
					<div class="spacer" data-height="50"></div>
					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Latest Posts</h3>
						<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">

						<div class="row">
							<div class="col-md-12 col-sm-6">
								<!-- post -->
                                @foreach ($blog_recents as $blog_recent)
                                <div class="post post-list clearfix">
									<div class="thumb rounded">
										<span class="post-format-sm">
											<i class="icon-picture"></i>
										</span>
										<a href="{{ route('single.blog.page', $blog_recent->id) }}">
											<div class="inner">
												<img width="80%" src="{{ asset('uploads/blog/') }}/{{ $blog_recent->blog_image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="#"><img style="width: 50px; height:50px; border-radius:50%;" src="{{ asset('uploads/user/') }}/{{ $blog_recent->rel_to_user->photo }}" class="author" alt="author"/>{{ $blog_recent->rel_to_user->name }}</a></li>
											<li class="list-inline-item"><a href="#">{{ $blog_recent->rel_to_category->category_name }}</a></li>
											<li class="list-inline-item">{{ $blog_recent->created_at->format('d M Y') }}</li>
										</ul>
										<h5 class="post-title"><a href="{{ route('single.blog.page', $blog_recent->id) }}">{{ $blog_recent->blog_title }}</a></h5>
										@if (strlen($popular->popular_desp) > 200)
                                          <p class="excerpt mb-0">{{ substr($popular->popular_desp, 0, 200).'..' }}</p>
                                        @endif
										<div class="post-bottom clearfix d-flex align-items-center">
											<div class="social-share me-auto">
												<button class="toggle-button icon-share"></button>
												<ul class="icons list-unstyled list-inline mb-0">
													<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
												</ul>
											</div>
											<div class="more-button float-end">
												<a href="blog-single.html"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
                                @endforeach
							</div>
						</div
						>
						<!-- load more button -->
						<div class="text-center">
							<button class="btn btn-simple">Load More</button>
						</div>

					</div>

				</div>
				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{asset('frontend')}}/assets/images/map-bg.png">
								<img src="{{asset('frontend')}}/assets/images/logo.svg" alt="logo" class="mb-4" />
								<p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
								<ul class="social-icons list-unstyled list-inline mb-0">
									<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>

						<!-- widget popular posts -->
						{{-- <div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Popular Posts</h3>
								<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<!-- post -->
                                @foreach ($popular_post->take(3) as $popular)
                                <div class="post post-list-sm circle">
									<div class="thumb circle">
										<span class="number">{{ App\Models\Blog::where('category_id', $popular->category_id)->count() }}</span>
										<a href="{{ route('single.trending.page', $popular->id) }}">
											<div class="inner">
												<img style="width: 60px; height:60px; border-radius:50%;" src="{{asset('uploads/blog/')}}/{{ $popular->popular_photo }}" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{ route('single.trending.page', $popular->id) }}">{{ $popular->popular_title }}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{ $popular->created_at->format('d M Y')  }}</li>
										</ul>
									</div>
								</div>
                                @endforeach
								<!-- post -->
							</div>
						</div> --}}

						<!-- widget categories -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Explore Topics</h3>
								<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<ul class="list">
                                    @foreach ($categories as $category)
									<li><a href="{{ route('category.show', $category->id) }}">{{ $category->category_name }}</a><span>({{ App\Models\Blog::where('category_id', $category->id)->count() }})</span></li>
                                    @endforeach
								</ul>
							</div>

						</div>

						<!-- widget newsletter -->
						<section id="subscribe" class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Newsletter</h3>
								<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<span class="newsletter-headline text-center mb-3">Join {{ $subscribers }} subscribers!</span>
								<form action="{{ route('subscriber') }}" method="post">
                                    @csrf
									<div class="mb-2">
										<input class="form-control w-100 text-center" name="subscriber" placeholder="Email address…" type="email">
									</div>
                                    @error('subscriber')
                                        <div class="alert alert-success">{{ $message }}</div>
                                    @enderror
									<button class="btn btn-default btn-full" type="submit">Sign Up</button>
								</form>
								<span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
							</div>
						</section>

						<!-- widget post carousel -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Celebration</h3>
								<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<div class="post-carousel-widget">
									<!-- post -->
                                    @foreach ($blogs as $blog)
                                    <div class="post post-carousel">
										<div class="thumb rounded">
											<a href="{{ route('category.show', $blog->rel_to_category->id) }}" class="category-badge position-absolute">{{ $blog->rel_to_category->category_name }}</a>
											<a href="blog-single.html">
												<div class="inner">
													<img style="width: 100%; height:400px;" src="{{ asset('uploads/blog/') }}/{{ $blog->blog_image }}" alt="post-title" />
												</div>
											</a>
										</div>
										<h5 class="post-title mb-0 mt-4"><a href="blog-single.html">{!! $blog->blog_title !!}</a></h5>
										<ul class="meta list-inline mt-2 mb-0">
											<li class="list-inline-item"><a href="#">{{ $blog->rel_to_user->name }}</a></li>
											<li class="list-inline-item">{{ $blog->created_at->format('d Y M') }}</li>
										</ul>
									</div>
                                    @endforeach
									<!-- post -->
								</div>
								<!-- carousel arrows -->
								<div class="slick-arrows-bot">
									<button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
									<button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>

						<!-- widget advertisement -->
						<div class="widget no-container rounded text-md-center">
							<span class="ads-title">- Sponsored Ad -</span>
							<a href="#" class="widget-ads">
								<img src="{{asset('frontend')}}/assets/images/ads/ad-360.png" alt="Advertisement" />
							</a>
						</div>

						<!-- widget tags -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Tag Clouds</h3>
								<img src="{{asset('frontend')}}/assets/images/wave.svg" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
                                @foreach ($tags as $tag)
								<a href="{{ route('tag.view', $tag->id) }}" class="tag">{{ $tag->tag }}</a>
                                @endforeach
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>
	</section>

	<!-- instagram feed -->
	<div class="instagram">
		<div class="container-xl">
			<!-- button -->
			<a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
			<!-- {{asset('frontend')}}/assets/images -->
			<div class="instagram-feed d-flex flex-wrap">
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/insta/insta-1.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/insta/insta-2.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/insta/insta-3.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/insta/insta-4.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/insta/insta-5.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/insta/insta-6.jpg" alt="insta-title" />
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
