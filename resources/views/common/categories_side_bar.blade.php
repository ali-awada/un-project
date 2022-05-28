    @foreach($categories as $category)
    <a href="{{route('userCategory.show',$category->id)}}" class="text-decoration-none  px-0 py-3 mb-2 border-bottom d-block">
        <span class=" d-flex align-items-center " style="gap: 10px">
            <img src="{{$category->image}}" alt="" width="40" class="rounded-circle">
            {{$category->en_name}}
        </span>
    </a>
    @endforeach