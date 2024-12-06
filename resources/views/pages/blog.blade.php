@extends('layout.app')
@push('scripts')
    <title>{{$blog->title}} || Murad Agamedov</title>

    <!-- Meta Description -->
    <meta name="description" content="{{$blog->meta_description}}">

    <!-- Meta Keywords -->
    <meta name="keywords" content="{{$blog->seo_keywords}}">

    <!-- Open Graph Image -->
    <meta property="og:image" content="{{$blog->seo_description}}">

    <!-- Open Graph Description (same as Meta Description if needed) -->
    <meta property="og:description" content="{{$blog->seo_description}}">

    <!-- Open Graph Title -->
    <meta property="og:title" content="{{$blog->title}} || Murad Agamedov">

    <!-- Open Graph Keywords (Note: Open Graph doesn’t officially support keywords, but if needed for other services) -->
    <meta property="og:keywords" content="{{$blog->seo_keywords}}">
@endpush

@section('content')

    <!--================================
    BREADCRUMB START
=================================-->
    <section
        class="tf__breadcrumb banner"
        style="background: url({{asset('assets/images/bg/breadcrumb.jpg')}})"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tf__breadcrum_text">
                        <h1>{{$blog->title}}</h1>
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{route('client.home')}}" class="text_hover_animaiton">Home</a>
                            </li>
                            <li><a >{{$blog->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================
        BREADCRUMB END
    =================================-->

    <!--================================
        BLOG DETAILS START
    =================================-->
    <section class="tf__blog_details pt_120 xs_pt_80 pb_120 xs_pb_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="tf__blog_details_area">
                        <div class="tf__blog_details_img">
                            <img
                                src="{{$blog->getImage($blog->inner_image)}}"
                                alt="blog"
                                class="img-fluid w-100"
                            />
                        </div>
                        <ul class="blog_details_header">
                            <li>{{ucfirst(__('site.category_one'))}}: </li>
                            <li><span>{{$blog->category->title}} </span></li>
                        </ul>
                        <div class="tf__blog_details_text">
                            <h2 class="has-animation">
                                {{$blog->title}}
                            </h2>

                            {!! $blog->text !!}
                        </div>
                        <div class="details_blog_share">
                            <h4>By Stanio lainto</h4>
                            <div class="share_icon">
                                <ul class="social_share d-flex flex-wrap">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-behance"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                </ul>
                                <ul class="tags d-flex flex-wrap">
                                    @foreach(explode(',', $blog->tags) as $tag)
                                        <li><a href="#">{{$tag}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <ul class="next_prev_button">
                            <!-- Previous Blog Post -->
                            @if($prevBlog)
                                <li class="previous_post">
                                    <a href="{{ route('client.blog', $prevBlog->slug) }}" data-cursor="Previous <br> post">
                                        <p>{{__('site.prev_post')}}</p>
                                        <h5>{{ $prevBlog->title }}</h5>
                                    </a>
                                </li>
                            @endif

                            <!-- Next Blog Post -->
                            @if($nextBlog)
                                <li class="next_post">
                                    <a href="{{ route('client.blog', $nextBlog->slug) }}" data-cursor="Next <br> post">
                                        <p>{{__('site.next_post')}}</p>
                                        <h5>{{ $nextBlog->title }}</h5>
                                    </a>
                                </li>
                            @endif
                        </ul>


                    </div>
                </div>
                @include('partials.aside')
            </div>
        </div>
    </section>
    <!--================================
        BLOG DETAILS END
    =================================-->


@endsection
