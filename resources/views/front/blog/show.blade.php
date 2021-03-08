@extends('layouts.front')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_single_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_single_responsive.css') }}">
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('storage/'.$post->image) }}" data-speed="0.8"></div>
</div>

	<!-- Single Blog Post -->
    @if (Session::get('lang') === 'English')
    <div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">
                        {{ $post->title_en }}
                    </div>
					<div class="single_post_text">

						<p>
                            {!! $post->details_en !!}
                        </p>
					</div>
				</div>
			</div>
		</div>
	</div>
    @else
    <div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">
                        {{ $post->title_ar }}
                    </div>
					<div class="single_post_text">

						<p>
                            {!! $post->details_ar !!}
                        </p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif


	<!-- Blog Posts -->

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
          @foreach ($posts as $post)

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{ asset('storage/'.$post->image) }})"></div>
                            <div class="blog_text">
                                @if (Session::get('lang') === 'English')
                                {!! str_limit($post->details_en, $limit = 300) !!}
                                @else
                                    {!! str_limit($post->details_ar, $limit = 300) !!}
                                @endif
                            </div>
                            <div class="blog_button"><a href="{{ route('blog.post',$post->id) }}">
                                @if (Session::get('lang') === 'English')
                                Continue Reading
                                @else
                                 أكمل القراءة
                                @endif

                            </a></div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

