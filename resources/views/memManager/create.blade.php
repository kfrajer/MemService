@extends('layout.pagecore')

@section('content')
    <h3 class="text-center">Adding a new item</h3>
    <form action="{{route('memManager.store')}}" method="post">
        @csrf
        @include('inc.strblock',['name' => 'name', 'title' => 'Name', 'value' => $memobj->name ?? ''])
        @include('inc.strblock',['name' => 'description', 'title' => 'Description', 'value' => $memobj->description ?? ''])
        @include('inc.strblock',['name' => 'type', 'title' => 'Content type', 'value' => $memobj->type ?? ''])
        @include('inc.strblock',['name' => 'uri', 'title' => 'URI', 'value' => $memobj->uri ?? ''])
        @include('inc.strblock',['name' => 'ttl', 'title' => 'TTL', 'value' => $memobj->ttl ?? ''])
        @include('inc.strblock',['name' => 'tags', 'title' => 'Tags', 'value' => $memobj->tags ?? ''])
        @include('inc.strblock',['name' => 'acl', 'title' => 'ACL', 'value' => $memobj->acl ?? ''])
        @include('inc.boolblock',['name' => 'useOnlyOnce', 'title' => 'Use only once', 'value' => $memobj->useOnlyOnce ?? ''])
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection