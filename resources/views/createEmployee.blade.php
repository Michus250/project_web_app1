@extends('layouts.app')

@section('content')
<div class="container">
   

    @foreach ($users as $item)
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <div class="row mb-3">
                    <label for="status" class="col-md-4 col-form-label text-md-end">{{$item->email }} </label>

                    <div class="col-md-6">
                        <select name="status" id="status">
                            <option value="{{$item->status}}">{{$item->status}}</option>
                            @foreach ($status as $item1)
                            @if ($item1 !== $item->status)
                                <option value="{{$item1}}">{{$item1}}</option>
                            @endif
                            
                            @endforeach
                            
                            
                        </select>
                        <button class="btn btn-primary" id="{{$item->id}}" name="changeButton" data-id ={{$item->id}}>{{__('Create employee')}}</button>
                    </div>
                    
           
            
    </div>
    </div>
        <br>
    @endforeach
  
</div>
@endsection

@section('js')
    
    
@endsection
{{-- <script src= {{asset("js/app.js")}}></script>  --}}


