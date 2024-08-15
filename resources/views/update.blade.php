@extends('master')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class=" py-3">
                        <h3 class=" text-center mb-2">Employee Management</h3>
                        <a href="{{route('read#employee'),$updatedata['id']}}">
                            <button class="btn btn-sm-outline text-decoration-none"><i class="fas fa-arrow-left"></i> Back</button>
                        </a>

                        <form action="{{route('save#Employee',$updatedata['id'])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class=" m-2">Name</label>
                                <input type="text" name="employeeName" class="form-control @error('employeeName') is-invalid @enderror" placeholder="Enter Name..." value="{{old('employeeName',$updatedata['name'])}}" />
                                @error('employeeName')
                                    <div class=" invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class=" m-2">Email</label>
                                <input type="email" name="employeeEmail" class="form-control @error('employeeEmail') is-invalid @enderror" placeholder="Enter Email..." value="{{old('employeeEmail',$updatedata['email'])}}" />
                                @error('employeeEmail')
                                    <div class=" invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phonenumber" class=" m-2">Phone Number</label>
                                <input type="number" name="employeePhone" class="form-control @error('employeePhone') is-invalid @enderror" placeholder="Enter Phonenumber..." value="{{old('employeePhone',$updatedata['phonenumber'])}}" />
                                @error('employeePhone')
                                    <div class=" invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" class=" m-2">Address</label>
                                <textarea name="employeeAddress" cols="50" rows="5" class=" form-control @error('employeeAddress') is-invalid @enderror" placeholder="Enter Address..." >{{old('employeeAddress',$updatedata['address'])}}</textarea>
                                @error('employeeAddress')
                                    <div class=" invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class=" float-end mt-3">
                                <input type="submit" value="Save" class="btn btn-primary" >
                            </div>   
                        </form>
                    </div>
                </div>    
            </div>
        </div>
@endsection