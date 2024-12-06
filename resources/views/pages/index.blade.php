@extends('layout.app')
@section('content')
@include('partials._seo', ['code' => 'home'])


<!--================================
    BANNER START
=================================-->
<section
    class="tf__banner banner"
    style="background: url({{asset('assets/images/bg/banner.jpg')}})">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-8">
                <div class="tf__banner_text">
                    <h1 style="margin-bottom: 0;">
                        {{$infos->hero_title}}
                        <span class="cd-headline rotate-1">
                            <!-- ANIMATE TEXT VALUES: zoom, rotate-1, letters type, letters rotate-2, loading-bar, slide, clip, letters rotate-3, letters scale, push,  -->
                            <span class="cd-words-wrapper">
                                @php
                                $index = 0;
                                @endphp
                                @foreach($heroStrings as $str)

                                <b class="{{$index == 0 ? 'is-visible': ""}}">{{$str->text}}</b>
                                @php
                                $index ++;
                                @endphp
                                @endforeach
                            </span>
                        </span>
                    </h1>
                    <div class="hero_desc">
                        <p>
                            {!! $infos->hero_description !!}
                        </p>
                    </div>


                    <ul>
                        <li>
                            <a class="common_btn" download="MuradAgamedovResume" href="{{\Illuminate\Support\Facades\Storage::url($infos->resume_file)}}">{{__('site.download_cv')}} <i class="fa-solid fa-arrow-down-to-line"></i></a>
                        </li>
                        <li>
                            {{--
                                <a
                                    class="banner_video_btn play_btn"
                                    href="https://www.youtube.com/watch?v=B-ytMSuwbf8"
                                ><i class="fa-sharp fa-solid fa-circle-play"></i> {{__('text.Watch the Video')}}</a>
                            --}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4">
                <div class="tf__banner_img">
                    <div class="img">
                        <img
                            src="{{$infos->getImage($infos->hero_image)}}"
                            alt="Murad Agamedov"
                            class="img-fluid w-100" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
        BANNER END
    =================================-->
<!--================================
        SERVICE START
    =================================-->
<section class="tf__service pt_130 xs_pt_80" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <div class="tf__section_heading mb_40">
                    <h5 class="has-animation">{{__('site.my_service')}}</h5>
                    <h2 class="has-animation">
                        {!! $infos->services_subtext !!}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="tf__single_service fade_left" data-trigerId="service">
                    <span>
                        <img
                            src="{{$service->getImage($service->image)}}"
                            alt="{{$service->title}}"
                            class="svg w-100" />
                    </span>
                    <h3>{{$service->title}}</h3>
                    <p>
                        {{$service->description}}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--================================
        SERVICE END
    =================================-->

<!--================================
        ABOUT START
    =================================-->
<section class="tf__about pt_140 xs_pt_80" id="about">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xxl-7 col-lg-6 col-xl-6">
                <div class="tf__section_heading pb_80 xs_pb_50">
                    <h5 class="has-animation">{{__('site.about_me')}}</h5>
                    <h2 class="has-animation">
                        {{$infos->about_section_title}}
                    </h2>
                </div>
                <div class="tf__about_text">
                    <p>
                        {{$infos->about_text}}
                    </p>
                    <a class="common_btn" href="#">{{__('site.download_cv')}} <i class="fa-solid fa-arrow-down-to-line"></i></a>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-6 col-xl-6">
                <div class="tf__about_img fade_right" data-trigerId="about">
                    <img
                        src="{{$infos->getImage($infos->about_image)}}"
                        alt="Murad Agamedov"
                        class="img-fluid w-100" />
                    <div class="tf__about_img_text">
                        <i class="fas fa-chart-pie-alt"></i>
                        <div class="tf__about_content">
                            <h4>{{__('site.my_devise')}}</h4>
                            <p>{{__('site.my_devise_text')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
        ABOUT END
    =================================-->

<!--================================
        DESIGN START
    =================================-->
<section class="tf__design mt_135 xs_mt_40 mb_120 xs_mb_80" id="counter">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="tf__design_text">
                    {!! $infos->get_in_touch_title !!}
                    <p class="">
                        {{$infos->get_in_touch_description}}
                    </p>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div
                            class="tf__design_counter fade_left"
                            data-trigerId="counter">
                            <span class="icon">
                                <img
                                    src="{{asset('assets/svg/complete-project.svg')}}"
                                    alt="counter"
                                    class="svg img-fluid w-100" />
                            </span>
                            <h3><span class="counter">{{$infos->project_count}}</span>+</h3>
                            <p>{{__('site.complete')}}</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div
                            class="tf__design_counter fade_left"
                            data-trigerId="counter">
                            <span class="icon">
                                <img
                                    src="{{asset('assets/svg/client-review.svg')}}"
                                    alt="counter"
                                    class="img-fluid w-100 svg" />
                            </span>
                            <h3><span class="counter">{{$infos->worker_on_project_count}}</span>+</h3>
                            <p>{{__('site.worker_on')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="tf__design_form">
                    <h2 class="has-animation">{{__('site.form_title')}}</h2>
                    <p class="">
                        {{__('site.form_subtext')}}
                    </p>
                    <form class="contactHomeForm" action="#">
                        <input class="" name="name" type="text" placeholder="{{__('site.form_name')}}" />
                        <input class="" name="email" type="email" placeholder="{{__('site.form_email')}}" />
                        <input class="" name="phone" type="text" placeholder="{{__('site.form_phone')}}" />
                        <textarea class="" name="message" rows="4" placeholder="{{__('site.form_message')}}"></textarea>
                        <button type="submit" class="common_btn">{{__('site.form_submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
        DESIGN END
    =================================-->

<!--================================
        SKILLS START
    =================================-->
<section class="tf__skills pt_115 xs_pt_75 pb_70 xs_pb_30" id="skills">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-8 m-auto mb_60">
                <div class="tf__section_heading mb_40">
                    <h5 class="has-animation">{{__('site.education_skills')}}</h5>
                    <h2 class="has-animation">
                        {!! $infos->education_subtext !!}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($experiences as $exp)
            <div class="col-xl-6 col-lg-6">
                <div
                    class="tf__single_skills fade_bottom"
                    data-trigerId="skills"
                    data-stagger=".13">
                    <span>{{$exp->year}}</span>
                    <h3>{{$exp->title}}</h3>
                    <p>
                        {!! $exp->text !!}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            @foreach($skills as $index => $skill)
            <div class="col-xl-6 col-lg-6">
                <div
                    class="tf__team_skills_bar_single fade_bottom"
                    data-trigerId="skills"
                    data-stagger=".25">
                    <p>{{ $skill->title }}</p>
                    <div id="bar{{ $index }}" class="barfiller">
                        <div class="tipWrap">
                            <span class="tip"></span>
                        </div>
                        <span class="fill" data-percentage="{{ $skill->percentage }}"></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================================
        SKILLS END
    =================================-->

<!--================================
        PORTFOLIO START
    =================================-->
<section class="tf__portfolio mt_120 xs_mt_80" id="projects">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-9 mb_30">
                <div class="tf__section_heading">
                    <h5 class="has-animation">{{__("site.mrp")}}</h5>
                    <h2 class="has-animation">
                        {!! $infos->subtext_portfolio !!}

                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @php
            $index = 0;
            @endphp

            @foreach($works as $work)
            @if($index == 0)
            <div class="col-xl-8 col-md-6">
                <a
                    data-cursor="{{__('site.go_to')}}"
                    target="_blank"
                    href="{{ $work->link }}"
                    class="tf__portfolio_item ">
                    <img
                        src="{{ $work->getImage($work->image) }}"
                        alt="{{ $work->title }}"
                        class="img-fluid w-100" />
                    <div class="text">
                        <h4 style="text-transform: lowercase;">{{ $work->link }}</h4>

                        <p>{{ $work->category }}</p>
                    </div>
                </a>
            </div>
            @elseif($index == 1)
            <div class="col-xl-4 col-md-6">
                <a
                    target="_blank"
                    data-cursor="{{__('site.go_to')}}"
                    href="{{ $work->link }}"
                    class="tf__portfolio_item ">
                    <img
                        src="{{ $work->getImage($work->image) }}"
                        alt="{{ $work->title }}"
                        class="img-fluid w-100" />
                    <div class="text">
                        <h4 style="text-transform: lowercase;">{{ $work->link }}</h4>

                        <p>{{ $work->category }}</p>
                    </div>
                </a>
            </div>
            @elseif($index == 2)
            <div class="col-xl-6 col-md-6">
                <a
                    target="_blank"
                    data-cursor="{{__('site.go_to')}}"
                    href="{{ $work->link }}"
                    class="tf__portfolio_item ">
                    <img
                        src="{{ $work->getImage($work->image) }}"
                        alt="{{ $work->title }}"
                        class="img-fluid w-100" />
                    <div class="text">
                        <h4 style="text-transform: lowercase;">{{ $work->link }}</h4>

                        <p>{{ $work->category }}</p>
                    </div>
                </a>
            </div>
            @elseif($index == 3)
            <div class="col-xl-6 col-md-6">
                <a
                    target="_blank"
                    data-cursor="{{__('site.go_to')}}"
                    href="{{ $work->link }}"
                    class="tf__portfolio_item ">
                    <img
                        src="{{ $work->getImage($work->image) }}"
                        alt="{{ $work->title }}"
                        class="img-fluid w-100" />
                    <div class="text">
                        <h4 style="text-transform: lowercase;">{{ $work->link }}</h4>

                        <p>{{ $work->category }}</p>
                    </div>
                </a>
            </div>
            @endif
            @php
            $index++;
            @endphp
            @endforeach


        </div>
    </div>
</section>
<!--================================
        PORTFOLIO END
    =================================-->

<!--================================
        TESTIMONIAL START
    =================================-->
<section class="tf__testimonial pt_115 xs_pt_75">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 m-auto mb_30">
                <div class="tf__section_heading">
                    <h5 class="has-animation">{{__('site.my_certs')}}</h5>
                </div>
            </div>
        </div>
        <div class="row testi_slider">
            @foreach($crts as $crt)
            <a href="{{$crt->getImage($crt->image)}}" class="col-xl-6 image_popup">
                <div style="padding: 0" class="tf__single_testimonial">
                    <img
                        src="{{$crt->getImage($crt->image)}}"
                        alt="clients"
                        class="img-fluid w-100" />
                </div>
            </a>
            @endforeach

        </div>
    </div>
</section>
<!--================================
        TESTIMONIAL END
    =================================-->

<!--================================
        BRAND START
    =================================-->
<div class="tf__brand mt_120 xs_mt_80">
    <div class="row">
        <div class="col-12">
            <div class="marquee_animi">
                <ul>
                    @foreach($lents as $lent)
                    <li>* {{$lent->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!--================================
        BRAND END
    =================================-->

<!--================================
        BLOG START
    =================================-->
<section class="tf__blog pt_125 xs_pt_75 pb_40 xs_pb_0" id="blogs">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-9 mb_30">
                <div class="tf__section_heading">
                    <h5 class="has-animation">{{__('site.my_blogs')}}</h5>
                    <h2 style="font-size: 27px" class="has-animation">
                        {{$infos->subtext_blogs}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-xl-4 col-md-6">
                <div class="tf__slingle_blog fade_left" data-trigerId="blogs">
                    <a
                        href="blog_details.html"
                        class="tf__blog_img"
                        data-cursor="read <br> more">
                        <img
                            src="{{$blog->getImage($blog->image)}}"
                            alt="blog"
                            class="img-fluid w-100" />
                    </a>
                    <div class="tf__blog_text">

                        <a href="blog_details.html">{{$blog->title}}</a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12">
                <a href="blog_list.html" class="common_btn">{{__('site.more_blog')}} +</a>
            </div>
        </div>
    </div>
</section>
<!--================================
        BLOG END
    =================================-->
@endsection
@push('scripts')


<script>
    $(document).ready(function() {
        if (window.location.hash === '#comment-success') {
            document.getElementById('commentFormSection').scrollIntoView({
                behavior: 'smooth'
            });
        }
        $('.contactHomeForm').on('submit', function(e) {
            e.preventDefault(); // Formun standart göndərilməsini dayandırır

            $.ajax({
                url: '{{ route("contact-form") }}', // API ünvanı
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Uğurlu göndərmə mesajı backend-dən gəlir
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __("site.success") }}',
                        text: response.message, // Backend-dən gələn uğurlu mesaj
                        confirmButtonText: '{{ __("site.ok") }}'
                    });
                    // Formu təmizləyin
                    $('#contactForm')[0].reset();
                },
                error: function(xhr) {
                    console.log(xhr); // Cavabı konsolda yoxlayın
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';

                        $.each(errors, function(key, value) {
                            errorMessages += value[0] + '<br>';
                        });

                        Swal.fire({
                            icon: 'error',
                            title: '{{ __("site.form_errors") }}',
                            html: errorMessages,
                            confirmButtonText: '{{ __("site.retry") }}'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '{{ __("site.error") }}',
                            text: '{{ __("site.unexpected_error") }}',
                            confirmButtonText: '{{ __("site.ok") }}'
                        });
                    }
                }
            });
        });
    });
</script>

@endpush
