@if(isset($is_details))
    <title>{{$code}}</title>
@else
    <title>{{$menuRepository->menuByCode($code)->name}} || Murad Agamedov</title>
@endif
