<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('layout.includes.head')

<body>
<!--================================
    PRELOADER START
=================================-->
<div class="preloader">
    <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
        <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
    </svg>
    <h5 class="preloader-text">Loading</h5>
</div>
<!--================================
    PRELOADER END
=================================-->
<x-header/>


@yield('content')



<!--================================
    SCROLL BUTTON START
=================================-->
<div class="progress active c-pointer">
    <svg
        class="progress-svg"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
    >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
<!--================================
    SCROLL BUTTON END
=================================-->

<!--================================
    CURSOR START
=================================-->
<div id="magic-cursor">
    <div id="ball"></div>
</div>
<!--================================
    CURSOR END
=================================-->
<x-footer/>
@include('layout.includes.foot')
</body>
</html>
