@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input hidden  id="blockedHours"  value="{{$blockedHours}}">
            <input hidden  id="blockedDays"  value="{{$blockedDays}}">
            <select name="doctor" id="doctor">
                @php
                    $id =0;    
                @endphp
            @foreach ($doctors as $item)
                

                <option value="{{$id}}" name="{{$id}}">Dr {{$item->name}} {{$item->surname}}</option>
                @php
                    $id +=1;
                @endphp
            @endforeach
            
            </select>
            <div class="card">
                <div class="card-header">{{ __('Make an apointment') }}</div>

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
                        @php
                            $id =0;
                        @endphp
                        @foreach ($doctors as $doctor)
                         
                        
                        <tbody style="display:none;" id ="tbody{{$id}}" class="tbody">
                         
                             
                         
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
                                <form action="{{asset("/createVisit")}}" method="post" name ="form{{$id}}" >
                                    @csrf
                                 <td class="align-middle col-3" name="time{{$id}}">
                                    
                                    {{-- <input  class="form-control col-3 timepicker{{$id}}{{$item1->englishDayOfWeek}}" id="hourbutton{{$id}}{{$item1->englishDayOfWeek}}" name="hour" autocomplete="off">
                                    <div name = "time{{$id}}"></div> --}}
                                    <select class ="form-control col-3" name="dateJs" id = "select{{$item1->englishDayOfWeek}}{{$id}}"></select>
                                </td>
                                <td>
                                    
                                        
                                    <input style="display:none;"hidden  name="id"  value="{{$doctor->employees->id}}">
                                    {{-- <input style="display:none;"hidden id="dateExamination{{$item1->englishDayOfWeek}}{{$id}}"  name="dateExamination"  value=" " class="date{{$id}}">     --}}

                                    <input type="submit" class="btn btn-primary button-edit my-1 mx-1" name ={{$id}} value ="{{__("Make an apointment")}}" id="button{{$id}}{{$item1->englishDayOfWeek}}" >

                                </form>
                                    {{-- <button   class="btn btn-primary button-edit my-1 mx-1" name ={{$id}} value ="{{$item1->format('Y-m-d')}}" id="button{{$id}}{{$item1->englishDayOfWeek}}" >{{__("Change")}}</button>     --}}
                                </td>  
                               <td style="display:none;">
                                <input hidden name="open{{$id}}" id ="open{{$item1->englishDayOfWeek}}{{$id}}" value="{{$item['open']}}">
                                <input hidden name="close{{$id}}" id ="close{{$item1->englishDayOfWeek}}{{$id}}" value="{{$item['close']}}">  
                                <input hidden name="day{{$id}}"  value="{{$item1->englishDayOfWeek}}">
                                <input hidden name="date{{$id}}"  value="{{$item1->format('d-m-Y')}}">
                                
                                <input type="text" id="datebutton{{$id}}{{$item1->englishDayOfWeek}}" value ="{{$item1->format('Y-m-d')}}">  
                                
                            </td>
                               
                              </tr>    
                               @endforeach
                               @php
                                   $id++;
                               @endphp
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