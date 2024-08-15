@extends('master')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class=" py-3">                     
                        @if (session('createSuccess'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('createSuccess') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                      
                        @endif

                        @if (session('updatingsuccess'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('updatingsuccess') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif

                        <h3 class=" text-center mb-2">Employee Management</h3>

                        <form action="{{route('create#employee')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class=" m-2">Name</label>
                                <input type="text" name="employeeName" class="form-control @error('employeeName') is-invalid @enderror" placeholder="Enter Name..." value="{{old('employeeName')}}" >
                                @error('employeeName')
                                    <div class=" invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class=" m-2">Email</label>
                                <input type="email" name="employeeEmail" class="form-control @error('employeeEmail') is-invalid @enderror" placeholder="Enter Email..." value="{{old('employeeEmail')}}" >
                                @error('employeeEmail')
                                <div class=" invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="phonenumber" class=" m-2">Phone Number</label>
                                <input type="number" name="employeePhone" class="form-control @error('employeePhone') is-invalid @enderror" placeholder="Enter Phonenumber..." value="{{old('employeePhone')}}" >
                                @error('employeePhone')
                                <div class=" invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" class=" m-2">Address</label>
                                <textarea name="employeeAddress" cols="50" rows="5" class=" form-control @error('employeeAddress') is-invalid @enderror" placeholder="Enter Address..." >{{old('employeeAddress')}}</textarea>
                                @error('employeeAddress')
                                <div class=" invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                            </div>

                            <div class=" float-end mt-3">
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>   
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                        <div class="py-3">
                            <table class="table table-striped table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addEmployee as $readdata) 
                                    <tr>
                                        <th>{{$readdata->id}}</th>
                                        <td>{{$readdata->name}}</td>
                                        <td>{{$readdata->email}}</td>
                                        <td>{{$readdata->phonenumber}}</td>
                                        <td>{{$readdata->address}}</td>
                                        <td>
                                        <div class=" btn-group">
                                        <a href="{{route ('update#Employee',$readdata->id)}}" class="text-decoration-none m-2">
                                        <button class="btn btn-sm btn-primary"> Update</button>
                                        </a>
                                        <form action="{{route ('delete#employee',$readdata->id)}}" method="POST" class=" m-2" >
                                        @csrf
                                        @method('delete')
                                        <a href="" class="text-decoration-none"><button class="btn btn-sm btn-danger"> Delete</button></a>
                                        </form>
                                    </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
            
                        </div>
                </div>
                
                </div>
           
        </div>
        {{ $addEmployee->links() }}
    
@endsection