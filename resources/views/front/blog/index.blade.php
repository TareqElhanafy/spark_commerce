@extends('layouts.front')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_responsive.css') }}">
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
                                {!! str_limit($post->details_en, $limit=300) !!}
                                @else
                                {!! str_limit($post->details_ar, $limit=300) !!}
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

