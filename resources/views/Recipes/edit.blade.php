@extends('layouts.app')

@section('content')
<form action="/report/update/{{$report->id}}" method="Post" onsubmit="return(validate());"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <div style="float:right;">
                    <a href="/allrecipes">
                        <i style="font-size:20px" class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <img class="img-fluid" src="{{ asset('images/'.$report->image) }}" alt="">
                <input id="img" type="file" name="image" value="{{$report->image}}" onchange="validateImage()"
                    class="form-control @error('image') is-invalid @enderror" id="fileUpload"
                    accept=".jpg,.jpeg,.png" />
                <small id="ImageHelp" class="form-text text-muted">the accepted extensions is jpg, jpeg, png.</small>
                <span id="ImgErr"></span>

                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label class="">Name:</label>
                    <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name"
                        value="{{$report->name}}">
                    <small id="NameHelp" class="form-text text-muted">Name must be unique, max 20 characters</small>
                    <span id="NameErr"></span>
                    @error('Name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="">Description:</label>
                    <textarea cols="50" id="descriptioninput" class="form-control @error('Description') is-invalid @enderror"
                        name="Description">{{$report->description}}</textarea>
                    <small id="DescriptionHelp" class="form-text text-muted">Description is required, min 10 character,
                        max 90 </small>
                    <span id="DescErr"></span>

                    @error('Description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Update</button>
        </div>
    </div>
</form>
@endsection
<script>
    function validateImage() {
    let formData = new FormData();
 
    let file = document.getElementById("fileUpload").files[0];
    let ImgErr = document.getElementById("ImgErr");
 
    formData.append("Filedata", file);
    let t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        ImgErr.classList.add("text-danger");
        ImgErr.innerHTML = "invalid extension";
        return false;
    }
    if (file.size > 1024000) {
        ImgErr.classList.add("text-danger");
        ImgErr.innerHTML = "size is large";
        return false;
    }
    
    return true;
}
function validate() {




let Name = document.getElementById("Name");
    let NameErr = document.getElementById("NameErr");
    var re = /^[a-zA-Z ]*$/;
    if (Name.value == "") {
        NameErr.classList.add("text-danger");
        NameErr.innerHTML = "name is required";
        return false;
    }
    if(Name.value.length >20){
        NameErr.classList.add("text-danger");
        NameErr.innerHTML = "name is too long";
        return false;
    }
    if (re.test(Name.value) == false) {
        NameErr.classList.add("text-danger");
        NameErr.innerHTML = "name can not contain numbers";
        return false;

    } else {
        NameErr.innerHTML = "";

    }

    // above validation of name and below for description

    let descInput = document.getElementById("descriptioninput");
    let DescErr =document.getElementById("DescErr");
    if(descInput.value == ""){
        DescErr.classList.add("text-danger");
        DescErr.innerHTML = "Description is required";
        return false;
    }
    if(descInput.value.length >90 || descInput.value.length < 10){
        DescErr.classList.add("text-danger");
        DescErr.innerHTML = "description length between 10 & 90 characters";
        return false;
    }
    else {
        DescErr.innerHTML = "";

    }

return (true);
}
</script>