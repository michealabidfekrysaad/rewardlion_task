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
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($message = Session::get('success'))
        <div class="text-center col-md-12">
            <a href="/allrecipes" class="btn bk-ground-color ">
                <i class="fa fa-eye"></i> view all recipes</a>
        </div>
        @endif
        <div class="col-md-8 col-xs-12  mt-2">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="/uploadRecipe" onsubmit="return(validate());" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Select_file">Choose Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="fileUpload" onchange="validateImage()" accept=".jpg,.jpeg,.png" />
                    <small id="ImageHelp" class="form-text text-muted">the accepted extensions is jpg, jpeg,
                        png.</small>
                    <span id="ImgErr"></span>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="Name">Name of Recipe:</label>
                    <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name"
                        placeholder="Enter Name of Recipe">
                    <small id="NameHelp" class="form-text text-muted">Name must be unique, max 20 characters</small>
                    <span id="NameErr"></span>

                    @error('Name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="Description">Description:</label>
                    <input type="text" id="descriptioninput"
                        class="form-control @error('Description') is-invalid @enderror" id="Description"
                        name="Description" placeholder="enter description for your recipe">
                    <small id="DescriptionHelp" class="form-text text-muted">Description is required, min 10 character,
                        max 90 </small>
                    <span id="DescErr"></span>
                    @error('Description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add Recipe</button>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection