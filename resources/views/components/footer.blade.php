<!--================================
    FOOTER START
=================================-->
<footer class="footer" id="footer">
    <div class="footer-container">
        <div class="pt_120 xs_pt_80 sm_pt_80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div
                            class="tf__footer_content fade_right"
                            data-trigerId="footer"
                            data-stagger=".25"
                        >
                            <div class="icon">
                                <div class="icon-contianer">
                                    <img
                                        src="{{asset('assets/svg/map.svg')}}"
                                        alt="footer"
                                        class="img-fluid w-100 svg"
                                    />
                                </div>
                            </div>
                            <div class="text">
                                <h3>{{__('site.address')}}</h3>
                                <p>{{__('site.baku')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div
                            class="tf__footer_content fade_right"
                            data-trigerId="footer"
                            data-stagger=".25"
                        >
                            <div class="icon">
                                <div class="icon-contianer">
                                    <img
                                        src="{{asset('assets/svg/phone.svg')}}"
                                        alt="footer"
                                        class="img-fluid w-100 svg"
                                    />
                                </div>
                            </div>
                            <div class="text">
                                <h3>{{__('site.contact')}}</h3>
                                <a href="callto:{{$infos->phone}}">{{$infos->phone_number}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div
                            class="tf__footer_content fade_right"
                            data-trigerId="footer"
                            data-stagger=".25"
                        >
                            <div class="icon">
                                <div class="icon-contianer">
                                    <img
                                        src="{{asset('assets/svg/envelope.svg')}}"
                                        alt="footer"
                                        class="img-fluid w-100 svg"
                                    />
                                </div>
                            </div>
                            <div class="text">
                                <h3>{{__('site.send_email')}}</h3>
                                <a href="mailto:{{$infos->email}}"
                                >{{$infos->email}}</a
                                >
                                <a href="mailto:{{$infos->phone_email}}">{{$infos->phone_email}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tf__footer_copyright">
                            <p>©  {{ now()->year }} <a href="https://muraddev.com/">muraddev.com</a> {{$infos->copyright_text}}</p>
                            <ul>
                                <li>
                                    <a href="#" class="text_hover_animaiton"
                                    >Trams & Condition</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="text_hover_animaiton"
                                    >Privacy Policy</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="text_hover_animaiton">Sitemap</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================================
FOOTER END
=================================-->
