@extends('frontend.master');
@section('content')
<section class="main-content">
    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-12">
              <div class="row gy-4">
                @foreach ($blogs as $blog)
                    <div class="col-sm-4">
                        <!-- post -->
                        <div class="post post-grid rounded bordered">
                            <div class="thumb top-rounded">
                                <a href="category.html" class="category-badge position-absolute">{{ $blog->rel_to_category->category_name }}</a>
                                <span class="post-format">
                                    <i class="icon-picture"></i>
                                </span>
                                <a href="blog-single.html">
                                    <div class="inner">
                                        <img style="width: 100%; height:400px;" src="{{ asset('uploads/blog/') }}/{{ $blog->blog_image }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><img style="width: 50px; height:50px; border-radius:50%;" src="{{ asset('uploads/user/') }}/{{ $blog->rel_to_user->photo }}" class="author" alt="author"/>{{ $blog->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">{{ $blog->blog_title }}</a></h5>
                                @if (strlen($blog->blog_desp) >100)
                                <p class="excerpt mb-0">{{ substr($blog->blog_desp, 0, 100).'..' }}</p>
                                @else
                                {{  $blog->blog_desp}}
                                @endif
                            </div>
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
            </div>
        </div>
    </div>
</section>

@endsection

