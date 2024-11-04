
<title>{{$menuRepository->menuByCode($code)->name}} || Murad Agamedov</title>

<!-- Meta Description -->
<meta name="description" content="{{$menuRepository->menuByCode($code)->meta_description}}">

<!-- Meta Keywords -->
<meta name="keywords" content="{{$menuRepository->menuByCode($code)->meta_keywords}}">

<!-- Open Graph Image -->
<meta property="og:image" content="{{$infos->getImage($infos->hero_image)}}">

<!-- Open Graph Description (same as Meta Description if needed) -->
<meta property="og:description" content="{{$menuRepository->menuByCode($code)->meta_description}}">

<!-- Open Graph Title -->
<meta property="og:title" content="{{$menuRepository->menuByCode($code)->name}} || Murad Agamedov">

<!-- Open Graph Keywords (Note: Open Graph doesn’t officially support keywords, but if needed for other services) -->
<meta property="og:keywords" content="{{$menuRepository->menuByCode($code)->meta_keywords}}">
