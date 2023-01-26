@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <select name="doctor" id="doctor">
                @php
                    $id =0;    
                @endphp
            @foreach ($doctors as $item)
                

                <option value="{{$item->employees->id}}" name="{{$id}}">Dr {{$item->name}} {{$item->surname}}</option>
                @php
                    $id +=1;
                @endphp
            @endforeach
            
            </select>
            <div class="card">
                <div class="card-header">{{ __('reception_hours') }}</div>

                <div class="card-body">
                    
                    
                    <table class="table">
                        <thead>
                          <tr class="text-center">
                            <th scope="col" class="align-middle">{{__("week_day")}}</th>
                            <th scope="col" class="align-middle" >{{__("Work hours start")}}</th>
                            <th></th>
                            
                            
                            
                            
                          
                           
                      
                        </thead>
                        @php
                            foreach ($doctors as $value) {
                                $work_hours[$value->employees->id] =json_decode($value->employees->work_hours, true);
                            }
                           
                            
                        @endphp
                        @foreach ($doctors as $doctor)
                            
                        
                        <tbody style="display:none;" id ="tbody{{$doctor->employees->id}}" class="tbody">
                         
                             
                         
                               @foreach ($work_hours[$doctor->employees->id] as $key=> $item)
                               @if ($item['open'] === '-')
                                   @continue
                               @endif
                               <tr class="text-center">
                                
                                <td class="align-middle">
                                {{__($key)}}
                                </td>
                                
                                 <td class="align-middle col-3">
                                    <input  class="form-control col-3 timepicker{{$doctor->employees->id}}{{$key}}">
                                   
                                </td>
                                <td>
                                    <button   class="btn btn-primary button-set my-1 mx-1" name ="set" >{{__("Change")}}</button>    
                                </td>  
                               <td style="display:none;">
                                <input  name="open{{$doctor->employees->id}}" id ="open{{$key}}{{$doctor->employees->id}}" value="{{$item['open']}}">
                                <input  name="close{{$doctor->employees->id}}" id ="close{{$key}}{{$doctor->employees->id}}" value="{{$item['close']}}">  
                                <input  name="day{{$doctor->employees->id}}"  value="{{$key}}">  
                               </td>
                               
                              </tr>    
                               @endforeach
                               @endforeach
                              
                              
                        </tbody>
                    </table>
    
                </div>
            </div>
        </div>
    </div>
</div>


<br>



@vite(['resources/js/createVisit.js'])
@endsection