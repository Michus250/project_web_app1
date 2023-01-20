@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('reception_hours') }} Dr {{$user->name}} {{$user->surname}}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ asset('changeHours') }}">
                        @csrf
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col" class="align-middle">{{__("week_day")}}</th>
                                <th scope="col" class="align-middle" >{{__("Work hours start")}}</th>
                                <th scope="col" class="align-middle" >{{__("Work hours end")}}</th>
                                
                                <th scope="col" class="align-middle">{{__("Working")}}</th>
                                
                              
                               
                          
                            </thead>
                           
                            <tbody>
                                   @foreach ($work_hours as $key=> $item)
                                   <tr class="text-center">
                                    
                                    <td class="align-middle">
                                    {{$key}}
                                    </td>
                                    
                                     <td class="align-middle col-3">
                                       
                                        <input type="text" class="form-control col-3 timepicker" id="open" type="text" class="form-control" name="open"
                                        
                                        @if ($item["isWorking"] === 'false')
                                            disabled
                                            value="" 
                                        @else
                                            value="{{$item['open']}}"
                                        @endif
                                        >
                                    </td>  
                                    <td class="align-middle col-3">
                                        
                                        <input  class="form-control " id="close" type="text" class="form-control" name="close"
                                        @if ($item["isWorking"] === 'false')
                                            disabled
                                            value="" 
                                        @else
                                            value="{{$item['close']}}"
                                        @endif>
                                        
                                    </td>    
                                           
                                        
                                            
                                        
                                      
                                        
                                    
                                    <td class="align-middle">
                                   
                                    <input type="checkbox" id="{{$key}}" name="{{$key}}" value="true" @if ($item['isWorking'] === 'true')
                                        checked
                                    @endif>
                                      </td>
                                   
                                  </tr>    
                                   @endforeach
                                   <tr class="text-center">
                                    <td class="align-middle"><button type="submit" class="btn btn-primary">{{__("Submit")}}</td>
                                    <td></td>
                                    <td></td>
                                   </tr>
                            </tbody>
                        </table>
                                
                                   
                                    
                                



                        {{-- <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                
                                <select name="hourStart" id="hourStart">
                                    @for ($i = 0; $i < 24; $i++)
                                       @if ($i<10)
                                       <option value="0{{$i}}">0{{$i}}</option>
                                       @else
                                       <option value="{{$i}}">{{$i}}</option> 
                                       @endif
                                        
                                    @endfor
                                </select>
                                <select name="minuteStart" id="minuteStart">
                                    @for ($i = 0; $i < 59; $i++)
                                       @if ($i<10)
                                       <option value="0{{$i}}">0{{$i}}</option>
                                       @else
                                       <option value="{{$i}}">{{$i}}</option> 
                                       @endif
                                        
                                    @endfor
                                </select>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> --}}
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
