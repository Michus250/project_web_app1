@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Examinations') }}</div>

                <div class="card-body">
                    
                    
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col" class="align-middle">{{__("Examination's name")}}</th>
                                <th scope="col" class="align-middle" >{{__("Price")}}</th>
                                <th scope="col" class="align-middle" ></th>

                            </thead>

                            <tbody>
                                @foreach ($examination as $item)
                                <tr class="text-center">
                                    
                                    <td class="align-middle">
                                            <div id="name{{$item->id}}">{{$item->name}}</div>
                                            <input  style="display: none;" class="form-control @error('examinationName') is-invalid @enderror" id="nameChange{{$item->id}}" value="{{$item->name}}">
                                            
                                            @error('examinationName')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </td>
                                    
                                     <td class="align-middle col-3">
                                        <div id="price{{$item->id}}">{{$item->price}}</div>
                                        <input style="display: none;" class="form-control @error('price') is-invalid @enderror" id="priceChange{{$item->id}}" value="{{$item->price}}"></div>
                                       
                                        @error('price')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                          
                                           @enderror  
                                      
                                    </td>  
                                    <td class="align-middle col-3">
                                        <button class="btn btn-primary button-edit" name ="{{$item->id}}" id="edit{{$item->id}}">{{__("Edit")}}</button>
                                        <button  style="display: none;" class="btn btn-primary button-change" name ="change" id="{{$item->id}}">{{__("Change")}}</button>

                                      
                                    </td>  
     
                                  </tr>     
                                @endforeach
                                  <form action="{{asset('/createExamination')}}" method="post">
                                    @csrf
                                    <tr class="text-center">
                                    
                                        <td class="align-middle">
                                            <input type="text" class="form-control @error('examinationName') is-invalid @enderror" name="examinationName">
                                            
                                        @error('examinationName')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        
                                        </td>
                                        
                                         <td class="align-middle col-3">
                                           <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                                           
                                           @error('price')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                          
                                           @enderror  
                                        </td>  
                                        <td class="align-middle col-3">
                                            <button type="submit" class="btn btn-primary ">{{__("Add")}}
                                      
                                        </td>  
         
                                      </tr>     
                                      <input type="text" name="id", value = -1 style="display: none;">
                                </form>
                            </tbody>
                        </table>

                     
   
                 
                </div>
            </div>
        </div>
    </div>
</div>


<br>

@vite(['resources/js/createExamination.js'])
@endsection