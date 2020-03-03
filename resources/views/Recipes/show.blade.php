@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="pr-3" style="float:right">
        <a href="/allrecipes">
            <i  style="font-size:25px" class="fas fa-times"></i>
        </a>
    </div>
    <div class="row mt-4">
        <div class="col-md-4 img-overflow">
            <a href="/report/edit/{{$report->id}}">
            <img class="hover-img img-fluid" title="click on image to update" src="{{ asset('images/'.$report->image) }}" alt="image">
        </a>
        </div>
        <div class="col-md-8">
            <h3>Name:</h3>
            <span class="span-col ml-5">{{$report->name}}</span>
            <h3>Description:</h3>
            <span class="span-col ml-5">{{$report->description}}</span>
        </div>
    </div>
</div>
@endsection
 
