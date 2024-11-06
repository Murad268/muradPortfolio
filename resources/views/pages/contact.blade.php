@extends('layout.app')
@section('content')
    @include('partials._seo', ['code' => 'contact'])
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
                        <h1>{{__('site.contact')}}</h1>
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html" class="text_hover_animaiton">{{__('site.home')}}</a>
                            </li>
                            <li>{{__('site.contact')}}</li>
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
        CONTACT START
    =================================-->
    <section class="tf__contact pt_110 xs_pt_70 pb_120 xs_pb_80">
        <div class="container">
            <div class="tf__section_heading pb_40">
                <h5 class="has-animation">{{__('site.Get In Touch')}}</h5>
                <h2 class="has-animation">
                    {{__("site.Let’s discuss")}}
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="tf__contact_form_area">
                        <form id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" name="name" placeholder="{{__('site.Your Name')}}*" required />
                                </div>
                                <div class="col-xl-6">
                                    <input type="email" name="email" placeholder="{{__("site.Your Email")}}*" required />
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="phone" placeholder="{{__('site.Phone Number')}}" />
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="website" placeholder="{{__("site.Your Website")}} ({{__("site.if have")}}})" />
                                </div>
                                <div class="col-xl-12">
                                    <textarea name="message" rows="7" placeholder="{{__("site.Write Your Message Here")}}" required></textarea>
                                    <button class="common_btn" type="submit">{{__("site.Send Mail")}}</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="tf__contact_map">
                        {!! $infos->iframe !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================
        CONTACT END
    =================================-->
@endsection
@push('scripts')


    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
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

