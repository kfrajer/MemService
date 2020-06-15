@extends('layout.pagecore')

@section('content')
<div class="qfc-container">
    <h2>Storage/Model Definition</h2>
    <label>Select a storage option to perform CRUD operations on</label>
      
    <ul class="navbar-nav ml-auto">
    <li class="li-item-cc">
            <a href="{{route('memManager.index')}}" class="nav-link disabled">Local Storage</a>
        </li>            
        <li class="li-item-cc">
            <a href="{{route('memManager.index')}}" class="nav-link">SQL Storage</a>
        </li> 
        <li class="li-item-cc">
            <a href="{{route('memManager.index')}}" class="nav-link disabled">Firebase Firestore</a>
        </li> 
    </ul>
      
</div> 
@endsection