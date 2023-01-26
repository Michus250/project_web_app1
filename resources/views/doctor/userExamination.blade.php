@extends('layouts.app')

@section('content')

@php
$i=0;
@endphp

@foreach ($visits as $visit)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
            
                
            
            <div class="card">
                <div class="card-header">{{$users[$i]->name}} {{$users[$i]->surname}}</div>
                <div class="card-body">
                    <form action="{{asset("/endExamination")}}" method="post">
                        @csrf
                    <div class="row mb-3"> 
                        <label for="nameExamination" class="col-md-4 col-form-label text-md-end">{{ __('Examination name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nameExamination" type="text" class="form-control @error('nameExamination') is-invalid @enderror" name="nameExamination" value="{{ old('nameExamination') }}" required  autofocus>
    
                                    @error('nameExamination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                    </div>
                
                <div class="row mb-3"> 
                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required  autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>
                <div class="row mb-3"> 
                    <label for="examinations" class="col-md-4 col-form-label text-md-end">{{ __('Examinations') }}</label>

                            <div class="col-md-6">
                                @foreach ($examinations as $item)
                                <input id="{{$item->id}}" value="{{$item->id}}" type="checkbox"  name="examinations[]"> {{$item->name}} <br>
                                @endforeach  
                            </div>
            </div>
            <div>
                <input type="hidden" name="user_id" value="{{$users[$i]->id}}">
                <input type="hidden" name="employee_id" value="{{$visit->employee_id}}">
                <input type="hidden" name="visit_id" value="{{$visit->id}}">
                
            </div>
            <input type="submit" class="btn btn-primary my-1 mx-1"  value ="{{__("Agree")}}"  >
        
            
  
        </div>
        
    </div>
    
    
</div>
</form>

<br>
@endforeach







@endsection