@extends('layout.app')
@section('content')
    @include('partials._seo', ['code' => 'blogs'])
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
                        <h1>{{__('site.my_blogs')}}</h1>
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{route('client.home')}}" class="text_hover_animaiton">{{__('site.home')}}</a>
                            </li>
                            <li><a>{{__('site.my_blogs')}}</a></li>
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
        BLOG LIST PAGE START
    =================================-->
    <section
        class="tf__blog_list_page pt_120 xs_pt_80 pb_120 xs_pb_80"
        id="blogs"
    >
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">

                    <!-- Axtarış, Tag və Kateqoriya mesajlarının göstərilməsi -->
                    @if(request()->has('search') || request()->has('tags') || request()->has('category'))
                        <div style="background: transparent" class="alert alert-info">
                            <strong>{{ __('site.filter_results') }}:</strong>
                            <ul>
                                @if(request()->has('search') && request()->search)
                                    <li>{{ __('site.search_results_for', ['search' => request()->search]) }}</li>
                                @endif

                                @if(request()->has('tags') && request()->tags)
                                    <li>{{ __('site.results_for_tag', ['tag' => request()->tags]) }}</li>
                                @endif

                                @if(request()->has('category') && request()->category)
                                    <li>{{ __('site.results_for_category', ['category' => request()->category]) }}</li>
                                @endif
                            </ul>
                            <!-- Filteri Sıfırlamaq üçün düymə -->
                            <a href="{{ route('client.blogs') }}" class="btn btn-danger mt-3">
                                {{ __('site.clear_filters') }}
                            </a>
                        </div>
                    @endif


                    <div class="row">
                        @if($blogPageBlogs->count() > 0)
                            @foreach($blogPageBlogs as $blog)
                                <div class="col-xl-12">
                                    <div class="tf__blog_list_item">
                                        <a
                                            href="{{route('client.blog', $blog->slug)}}"
                                            data-cursor="Read <br> More"
                                            class="tf__blog_list_img"
                                        >
                                            <img
                                                src="{{$blog->getImage($blog->image)}}"
                                                alt="blog list"
                                                class="img-fluid w-100"
                                            />
                                            <span><b>{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</b> {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('F') }}</span>

                                        </a>
                                        <div class="tf__blog_list_text">
                                            <a href="{{route('client.blog', $blog->slug)}}"
                                            >{{$blog->title}}</a
                                            >
                                            <p>
                                                {!! substr(strip_tags($blog->text), 0, 320) !!} ...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Nəticə tapılmayıbsa -->
                            <div class="col-12">
                                <p>{{ __('site.no_results_found') }} "{{ request()->search ?? request()->tags ?? request()->category }}"</p>
                            </div>
                        @endif
                    </div>

                    <div class="tf__pagination">
                        <div class="row">
                            <div class="col-12">
                                <nav aria-label="Page navigation example">
                                    {{ $blogPageBlogs->links('pagination::bootstrap-4') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.aside')
            </div>
        </div>
    </section>
    <!--================================
        BLOG LIST PAGE END
    =================================-->

    @include('partials.subs')

@endsection
