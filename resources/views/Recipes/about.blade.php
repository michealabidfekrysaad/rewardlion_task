@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-12 col-md-8">
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    Full Stack Web Developer
                </div>
                <div class="card-body pt-0">
                    <div class="row pt-4">
                        <div class="col-7">
                            <h2 class="lead"><b>Micheal Abid Fekry</b></h2>
                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UI-UX / laravel-angular framework </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted mt-2">
                                <li class="small p-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                    Address: Egypt,alexandria,victoria,street abd elhakim el garah</li>
                                <li class="small p-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                    Phone #: + 012 - 79211807</li>

                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{ asset('images/micheal.png') }}" alt="" class="img-size img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="{{ asset('cv/micheal-full-stack.pdf')}}" class="btn btn-sm bg-teal">
                            <i class="fas fa-lg fa-download"></i> Download Cv
                        </a>
                    <a href="/" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i> Add Recipe
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection