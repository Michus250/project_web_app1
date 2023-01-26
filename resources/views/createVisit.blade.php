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
                        {{-- @php
                            foreach ($doctors as $value) {
                                $work_hours[$value->employees->id] =json_decode($value->employees->work_hours, true);
                                // $work[$value->employees->id] =json_decode($work_hours[$value->employees->id], true);
                            }
                           
                            
                        @endphp --}}
                        @foreach ($doctors as $doctor)
                         
                        
                        <tbody style="display:none;" id ="tbody{{$doctor->employees->id}}" class="tbody">
                         
                             
                         
                               @foreach ($date as $item1)
                               @php
                               $work_hours =json_decode($doctor->employees->work_hours, true);
                               
                                $day =$item1->englishDayOfWeek;
                                $item = $work_hours[$day];
                               @endphp
                               @if ($item['open'] === '-')
                                   @continue
                               @endif
                               <tr class="text-center">
                                
                                <td class="align-middle">
                                {{$item1->format('d-m-Y');}}
                                <br>
                                {{__($item1->englishDayOfWeek)}}
                                </td>
                                <form action="{{asset("/createVisit")}}" method="post">
                                    @csrf
                                 <td class="align-middle col-3">
                                    <input  class="form-control col-3 timepicker{{$doctor->employees->id}}{{$item1->englishDayOfWeek}}" id="hourbutton{{$doctor->employees->id}}{{$item1->englishDayOfWeek}}" name="hour">
                                   
                                </td>
                                <td>
                                    
                                        
                                        <input style="display:none;"  name="day"  value="{{$item1->englishDayOfWeek}}">
                                        <input style="display:none;"  name="id"  value="{{$doctor->employees->id}}">
                                        <input style="display:none;"  name="date"  value="{{$item1->format('Y-m-d')}}">
                                        

                                    <input type="submit" class="btn btn-primary button-edit my-1 mx-1" name ={{$doctor->employees->id}} value ="{{__("Change")}}" id="button{{$doctor->employees->id}}{{$item1->englishDayOfWeek}}" >
                                    </form>
                                    {{-- <button   class="btn btn-primary button-edit my-1 mx-1" name ={{$doctor->employees->id}} value ="{{$item1->format('Y-m-d')}}" id="button{{$doctor->employees->id}}{{$item1->englishDayOfWeek}}" >{{__("Change")}}</button>     --}}
                                </td>  
                               <td style="display:none;">
                                <input  name="open{{$doctor->employees->id}}" id ="open{{$item1->englishDayOfWeek}}{{$doctor->employees->id}}" value="{{$item['open']}}">
                                <input  name="close{{$doctor->employees->id}}" id ="close{{$item1->englishDayOfWeek}}{{$doctor->employees->id}}" value="{{$item['close']}}">  
                                <input  name="day{{$doctor->employees->id}}"  value="{{$item1->englishDayOfWeek}}"> 
                                <input type="text" id="datebutton{{$doctor->employees->id}}{{$item1->englishDayOfWeek}}" value ="{{$item1->format('Y-m-d')}}">  
                                
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