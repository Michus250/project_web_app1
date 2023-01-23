@extends('layouts.app')

@section('content')
@foreach ($user as $user)

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
                                
                                
                                
                              
                               
                          
                            </thead>
                            @php
                                $work_hours =json_decode($user->employees->work_hours, true); 
                                
                            @endphp
                           
                            <tbody>
                             
                                   @foreach ($work_hours as $key=> $item)
                                   <tr class="text-center">
                                    
                                    <td class="align-middle">
                                    {{__($key)}}
                                    </td>
                                    
                                     <td class="align-middle col-3">
                                       
                                       {{$item['open']}}
                                    </td>  
                                    <td class="align-middle col-3">
                                        {{$item['close']}}
                                       
                                    </td>    
                                   
                                   
                                  </tr>    
                                   @endforeach
                                  
                            </tbody>
                        </table>

                     
   
                 
                </div>
            </div>
        </div>
    </div>
</div>


<br>
@endforeach   


@endsection