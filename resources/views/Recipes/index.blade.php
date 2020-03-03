@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center mb-2">
                <a href='/' class="btn bk-ground-color"><i class="fa fa-plus-square"></i> Add new Recipe</a>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $key=>$report)

                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td> <img src="{{ asset('images/'.$report->image) }}" style="width:50px;height:50px" /></td>
                        <td>{{$report->name}}</td>
                        <td>{{$report->description}}</td>
                        <td class="text-center" style="width:350px">
                            <a href="/report/show/{{$report->id}}" class="btn btn-info m-1"><i class="fa fa-eye"></i> show</a>
                            <a href="/report/edit/{{$report->id}}" class="btn btn-primary m-1"><i class="fa fa-edit"></i> update</a>
                            <form class="d-inline" action="/report/delete/{{$report->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                
                                <button type="submit"  onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> delete</button>
                                <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              </form>


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
        {{ $reports->links() }}

    </div>
</div>
@endsection