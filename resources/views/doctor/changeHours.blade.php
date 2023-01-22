@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('reception_hours') }} Dr {{$user->name}} {{$user->surname}}</div>

                <div class="card-body">
                    
                    
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col" class="align-middle">{{__("week_day")}}</th>
                                <th scope="col" class="align-middle" >{{__("Work hours start")}}</th>
                                <th scope="col" class="align-middle" >{{__("Work hours end")}}</th>
                                
                                <th scope="col" class="align-middle">{{__("Working")}}</th>
                                
                              
                               
                          
                            </thead>
                            <form method="POST" action="{{ asset('changeHours') }}" id="form" name="form">
                                @csrf
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                   @foreach ($work_hours as $key=> $item)
                                   <tr class="text-center">
                                    
                                    <td class="align-middle">
                                    {{$key}}
                                    </td>
                                    
                                     <td class="align-middle col-3">
                                       
                                        <input  class="form-control col-3 timepicker open" id="open{{$i}}"  class="form-control" name="open[]"
                                        
                                        @if ($item["isWorking"] === 'false')
                                            type ="hidden"
                                            value=""
                                            required ="false" 
                                        @else
                                            type="text"
                                            value="{{$item['open']}}"
                                            required ="true"
                                        @endif
                                        >
                                    </td>  
                                    <td class="align-middle col-3">
                                        
                                        <input  class="form-control timepicker close" id="close{{$i}}"   name="close[]"
                                        @if ($item["isWorking"] === 'false')
                                            type ="hidden"
                                            value="" 
                                            required ="false"
                                        @else
                                            type="text"
                                            value="{{$item['close']}}"
                                            required ="true"
                                        @endif>
                                        
                                    </td>    
                                    <td class="align-middle">
                                   
                                    <input type="checkbox" class=" checkbox" id="{{$i}}" name="isWorking[{{$i}}]"  @if ($item['isWorking'] === 'true')
                                        checked
                                        value="true"
                                    @else
                                        value="false"
                                    @endif>
                                    @php
                                        $i+= 1;
                                    @endphp
                                      </td>
                                   
                                  </tr>    
                                   @endforeach
                                  
                            </tbody>
                        </table>

                        <div class = "d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary ">{{__("Submit")}}</td>
                        </div>
   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/changeHours.js'])
@endsection
