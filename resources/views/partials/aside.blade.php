<div class="col-xl-4 col-lg-4">
    <div class="tf__sidebar">
        <div class="tf__sidebar_item tf__sidebar_search">
            <h3>{{__('site.search')}}</h3>
            <form action="{{route('client.blogs')}}">
                <input type="text" name="search" placeholder="{{__('site.search_blog')}}" />
                <button type="submit">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="tf__sidebar_item tf__sidebar_category mt_30">
            <h3>{{__('site.category')}}  </h3>
            <ul>
                @foreach($blogCategories as $cat)
                    <li>
                        <a href="{{ request()->fullUrlWithQuery(['category' => $cat->id]) }}">
                            {{$cat->title}} <span>({{$cat->blogs->count()}})</span>
                        </a>
                    </li>
                @endforeach
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
        <div class="tf__sidebar_item tf__sidebar_tags mt_30">
            <h3>Tags</h3>
            <ul>
                @foreach($allTags as $tag)
                    @foreach(explode(',', $tag->tags) as $stag)
                        @if(!empty($stag))
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['tags' => $stag]) }}">
                                    {{ $stag }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>
