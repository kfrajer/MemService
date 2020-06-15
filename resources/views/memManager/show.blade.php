@extends('layout.pagecore')

@section('content')
    <h3 class="text-center">{{$memobj->name}}</h3>
    <p><b>Description:</b>{{$memobj->description}}</p>
    <p><b>Type:</b>{{$memobj->type}}</p>
    <p><b>URI:</b>{{$memobj->uri}}</p>
    <p><b>TTL:</b>{{$memobj->ttl}} secs</p>
    <p><b>Tags:</b>{{$memobj->tags}}</p>
    <p><b>ACL:</b>{{$memobj->acl}}</p>
    <p><b>Use once:</b>{{$memobj->useOnlyOnce ? 'Yes' : 'No'}}</p>
    <p><b>Created:</b>{{$memobj->created_at}}</p>
    <p><b>Updated:</b>{{$memobj->updatedd_at ?? 'na'}}</p>
    <p><b>Deleted:</b>{{$memobj->deleted_at ?? 'na'}}</p>
    <br>
    <a href="{{route('memManager.edit',$memobj->id)}}" class="btn btn-primary float-left">Update</a>
    <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" action="{{route('memManager.destroy',$memobj->id)}}">
        @csrf
        @method('DELETE')
    </form>
@endsection