<!--================================
    MENU START
=================================-->
<nav class="navbar navbar-expand-lg main_menu">
    <div class="container main_menu_bg">
        <a class="navbar-brand" href="{{route('client.home')}}">
            <img src="{{$infos->getImage($infos->logo)}}" alt="muraddev.com" class="img-fluid w-100" />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fa-sharp fa-regular fa-bars bar_icon"></i>
            <i class="fa-regular fa-xmark close_icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                @foreach($headerMenus as $menu)
                    @if(!$loop->last)
                        <li class="nav-item">
                            <a class="nav-link text_hover_animaiton {{ request()->is($menu->code) ? 'active' : '' }}" href="{{ $menu->link }}">
                                {{ $menu->name }}
                            </a>
                        </li>
                    @endif
                @endforeach

                <li class="nav-item">
                    <a class="nav-link text_hover_animaiton" href="#about">
                        {{ __("site.about us") }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text_hover_animaiton" href="#service">
                        {{ __("services") }}
                    </a>
                </li>

                @if($headerMenus->isNotEmpty())
                    <li class="nav-item">
                        <a class="nav-link text_hover_animaiton {{ request()->is($headerMenus->last()->code) ? 'active' : '' }}" href="{{ $headerMenus->last()->link }}">
                            {{ $headerMenus->last()->name }}
                        </a>
                    </li>
                @endif
            </ul>

            <span
                class="toggle_icon c-pointer"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"
            ><i
                    class="fa-sharp fa-sharp fa-regular fa-bars bar_icon-staggered"
                ></i
                ></span>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
    <div class="offcanvas-header">
        <a class="offcanvas-logo" href="{{route('client.home')}}">
            <img src="images/logo2.png" alt="ZAYAN" class="img-fluid w-100" />
        </a>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
        >
            <i class="fa-regular fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="tf__design_form offcanvas_form">
            <div class="offcanvas-content-box">
                <h4 class="offcanvas_title">{{__("site.About us")}}</h4>
                <p>
                   {{$infos->hamburger_menu_about_text}}
                </p>
            </div>
            <div class="offcanvas_contact_form">
                <h4 class="offcanvas_title">{{__("site.Get In Touch")}}</h4>
                <form id="contactForm" action="#">
                    <input
                        type="text"
                        placeholder="{{__("site.Your Name")}}"
                        aria-autocomplete="list"
                        name="name"
                    />
                    <input type="email" name="email" placeholder="{{__("site.Your Email")}}" />
                    <textarea rows="4" name="message" placeholder="{{__("site.Write Your Message Here")}}"></textarea>
                    <button type="submit" class="common_btn">{{__("site.Send Mail")}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--================================
    MENU END
=================================-->
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
