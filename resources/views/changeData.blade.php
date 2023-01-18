@extends('layouts.app')

@section('content')
<div class="container">
   

    <table class="table">
        <thead>
          <tr>
            <th scope="col">{{__("Name")}}</th>
            <th scope="col">{{__("Surname")}}</th>
            
            <th scope="col">{{__("Address")}}</th>
            <th scope="col">{{__("phoneNumber")}}</th>
            
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            <form action="{{asset('/changeData')}}" method="post">
                @csrf
                <tr>
                    <td><input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </th>
                    <td>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$user->surname}}" required>
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </th>
                    <td>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address}}" required>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </th>
                    <td>
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$user->phone_number}}" required>
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </th>
                    <td><button class="btn btn-primary">Zmien dane</button></td>
                  </tr> 
            </form>
          
    
       

        
  
  



@endsection