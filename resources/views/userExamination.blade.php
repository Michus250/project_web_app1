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
                               
                                        {{$doctors[$i]->name}} {{$doctors[$i]->surname}} {{$doctors[$i]->id}}
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
                            
                        <tbody  id ="" class="tbody">
              
                        </tbody>
                    </table>
        </div>
    </div>
</div>


<br>




@endsection