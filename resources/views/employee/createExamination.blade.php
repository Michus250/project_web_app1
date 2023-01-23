@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('reception_hours') }}</div>

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
                                            {{$item->name}}
                                    </td>
                                    
                                     <td class="align-middle col-3">
                                       {{$item->price}}
                                      
                                    </td>  
                                    <td class="align-middle col-3">
                                       
                                      
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
                                            <button type="submit" class="btn btn-primary ">{{__("Submit")}}
                                      
                                        </td>  
         
                                      </tr>     
                                
                                </form>
                            </tbody>
                        </table>

                     
   
                 
                </div>
            </div>
        </div>
    </div>
</div>


<br>


@endsection