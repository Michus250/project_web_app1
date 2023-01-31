@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{ __('Your examination') }}</div>

                <div class="card-body">
                    
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" class="align-middle">{{__("Doctor")}}</th>
                            <th scope="col" class="align-middle" >{{__("Date")}}</th>
                        </tr>
                        <tbody  id ="" class="tbody">
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($visits as $visit)
                                
                            <tr>
                            <td class="align-middle">
                               
                                        {{$doctors[$i]->name}} {{$doctors[$i]->surname}}
                                </td>
                                @php
                                    $i++;
                                @endphp
                                    
                                 <td class="align-middle col-3">
                                      
                                    {{$visit->date}}
                                   
                                </td>  
                            </tr>
                                @endforeach

                        </tbody>
                    </table>

                    
    
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('History') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="align-middle">{{__("Doctor")}}</th>
                                <th scope="col" class="align-middle">{{__("Examination name")}}</th>
                                <th scope="col" class="align-middle">{{__("Description")}}</th>
                                <th scope="col" class="align-middle">{{__("Price")}}</th>
                                <th scope="col" class="align-middle" >{{__("Date")}}</th>
                            </tr>
                        </thead>
                        <tbody  id ="" class="tbody">
                            @php
                                $i =0;
                            @endphp
                    @foreach ($history as $item)
                            <tr>
                                <td>{{$employees[$i]->name}} {{$employees[$i]->surname}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
              
                            @php
                                $i++;
                            @endphp
                    @endforeach
                    </tbody>
                    </table>
        </div>
    </div>
</div>


<br>




@endsection