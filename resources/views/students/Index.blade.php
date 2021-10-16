@extends('students.layout')

@section('content')
<div class="pull-left">
    <h2>student Crud Step by Step</h2>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('students.create')}}"> Create New Student</a>
        </div>
    </div>
</div>

@if($message=Session::get('Success'))
    <div class="alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{$student->studname}}</td>
        <td>{{$student->course}}</td>
        <td>{{$student->fee}}</td>
        <td>
            <form action="{{route('students.destroy',$student->id)}}"method="POST">
                <a class="btn btn-info" href="{{route('students.show',$student->id)}}">Show</a>
                <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit"class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>        
