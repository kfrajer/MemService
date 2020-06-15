@extends('layout.pagecore')

@section('content')
    <h2 class="text-center">Current items</h2>
    <ul class="list-group py-3 mb-3">
        @forelse($memobjs as $mobj)
            <li class="list-group-item my-2">
                <h5>{{$mobj->name}}</h5>
                <p class="float-right">{{$mobj->type}}</p>
                <p>{{Str::limit($mobj->description,20)}}</p>
                <small class="float-right">{{$mobj->created_at->diffForHumans()}}</small>
                <a href="{{route('memManager.show',$mobj->id)}}">Read More</a>
            </li>
        @empty
            <h4 class="text-center">No items found in current session!</h4>
        @endforelse
    </ul>
    <div class="d-flex justify-content-center">
        {{$memobjs->links()}}
    </div>
@endsection