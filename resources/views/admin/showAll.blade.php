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
            <th scope="col">{{__("personalIdNumber")}}</th>
            <th scope="col">{{__("Email")}}</th>
            <th scope="col">{{__("status")}}</th>
            <th scope="col">{{__("dateOfBirth")}}</th>
           
          </tr>
        </thead>
        <tbody>
                @foreach ($users as $item)
                @php
                    $date = new DateTime($item->date_of_birth);
                    
                    
                @endphp
                <tr>
                    <td>
                       {{$item->name}}
                    </th>
                    <td>
                        {{$item->surname}}
                    </th>
                    <td>
                        {{$item->address}}
                    </th>
                    <td>
                        {{$item->phone_number}}
                    </th>
                    <td>
                        {{$item->personal_id_number}}
                    </th>
                    <td>
                        {{$item->email}}
                    </th>
                    <td>
                        {{$item->status}}
                    </td>
                    <td>
                        {{$date->format(__("dateFormat"));}}
                    </td>
                  </tr>   
                @endforeach
            
               

@endsection