@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
             
                <div class="col-md-6">
                 <div class="card p-2">
                    @if($errors)
                    @foreach ($errors->all() as $error)
                   <div><ul>
                    <li>{{ $error }}</li></ul></div>
                    @endforeach
                    @endif
                    <form  method="post" enctype="multipart/form-data"
                    @if (isset($singleTeacher->id))
                        action="{{ route('teacher.update',['id'=>$singleTeacher->id]) }}">
                        <input type="hidden" name="_method" value="PUT">
                        @else
                        action="{{ route('teacher.post') }}">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="name@example.com" name="name" value="{{ old('name',isset($singleTeacher->name)?$singleTeacher->name:'')}}">
                        </div>
            
                        <div class="mb-3">
                            <label  class="form-label">Phone</label>
                            <input type="number" class="form-control" placeholder="Enter phone number" name="phone" value="{{  old('phone',isset($singleTeacher->phone)? $singleTeacher->phone:'') }}">
                        </div>
            
                        <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="name@example.com" name="email" value="{{ old('email',isset($singleTeacher->email)?$singleTeacher->email:'') }}">
                        </div>
            
                        <div class="mb-3">
                            <input type="submit" class="form-control">
                        </div>
                      
                    </form>
                 </div>
                 </div>
             
            
                <div class="col-md-6">
                  <div class="card p-2">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Sr:</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">phone</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @forelse ($allTeacher as $key=>$teacher)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teacher.edit',['id'=>$teacher->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('teacher.delete',['id'=>$teacher->id]) }}" class="btn btn-primary">Delete</a>
                                      </div>
                                </td>
                            
                              
                              </tr>
                                
                              @empty
                              <p>No data Available</p>
                            @endforelse
                       
                           
                        </tbody>
                      </table>
                  </div>
                 </div>
             

            </div>

        </div>
    </div>
@endsection