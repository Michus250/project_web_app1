@extends('layouts.app')

@section('content')
@vite(['resources/js/createEmployee.js'])
<div class="container">
   

    @foreach ($users as $item)
    @if ($item->status === 'user')
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <div class="row mb-3">
                    <label for="status" class="col-md-4 col-form-label text-md-end">{{$item->name}} {{$item->surname}} {{$item->email}}  </label>

                    <div class="col-md-6">
                        <select name="status" id="status">
                            
                            @foreach ($status as $item1)
                            @if ($item1 !== 'user')
                                <option value="{{$item1}}">{{$item1}}</option>
                            @endif
                            
                            @endforeach
                            
                            
                        </select>
                        <button class="btn btn-primary" id="{{$item->id}}" name="changeButton" data-id ={{$item->id}}>{{__('Create employee')}}</button>
                    </div>
                    
           
            
    </div>
    </div>
        <br>  
    @endif
    
    @endforeach
  
</div>
@endsection

@section('js')
    
    
@endsection
{{-- <script src= {{asset("js/app.js")}}></script>  --}}


