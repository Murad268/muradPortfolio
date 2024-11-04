<div class="col-xl-4 col-lg-4">
    <div class="tf__sidebar">
        <div class="tf__sidebar_item tf__sidebar_search">
            <h3>{{__('site.search')}}</h3>
            <form action="{{route('client.blogs')}}">
                <input type="text" name="search" placeholder="{{__('site.search_project')}}" />
                <button type="submit">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="tf__sidebar_item tf__sidebar_category mt_30">
            <h3>{{__('site.category')}}  </h3>
            <ul>
                <li>
                    <a href="{{ request()->fullUrlWithQuery(['category' => "PHP - only Backend"]) }}">
                       {{__('site.PHP - only Backend')}} <span></span>
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['category' => "Sites I work on and provide technical support on"]) }}">
                        {{__('site.Sites I work on and provide technical support on')}} <span></span>
                    </a>
                </li>

            </ul>
        </div>

        <div
            class="tf__sidebar_item tf__sidebar_gallery mt_30 gallery_popup"
        >
            <h3>{{__('site.ai_gallery')}}</h3>
            <ul>
                @foreach($ais as $ai)
                    <li>
                        <a href="{{$ai->getImage($ai->image)}}">
                            <img
                                src="{{$ai->getImage($ai->image)}}"
                                alt="{{$ai->title}}"
                                class="img-fluid w-100"
                            />
                            <div class="gal_img_overlay">
                                <i class="fa-sharp fa-solid fa-eye"></i>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
