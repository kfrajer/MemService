@extends('layout.pagecore')

@section('content')
    <h3 class="text-center">Adding a new item</h3>
    <form action="{{route('memManager.store')}}" method="post">
        @csrf
        @include('inc.strblock',['name' => 'name', 'title' => 'Name'])
        @include('inc.strblock',['name' => 'description', 'title' => 'Description'])
        @include('inc.strblock',['name' => 'type', 'title' => 'Content type'])
        @include('inc.strblock',['name' => 'uri', 'title' => 'URI'])
        @include('inc.strblock',['name' => 'ttl', 'title' => 'TTL'])
        @include('inc.strblock',['name' => 'tags', 'title' => 'Tags'])
        @include('inc.strblock',['name' => 'acl', 'title' => 'ACL'])
        @include('inc.boolblock',['name' => 'useOnlyOnce', 'title' => 'Use only once'])
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection