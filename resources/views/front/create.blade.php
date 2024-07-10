@extends('layouts.app')
   @section('title' , 'New Todos')
   @section('content')
   <div class="container pt-5">
      <div class="row justify-content-center mt-5">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header">
                  <h1 class="text-center">@lang('site.create')</h1>
               </div>
               <div class="card-body">
               @include('layouts._errors')

                 <form action="{{route('todo.store')}}" method="POST">
                 @csrf
                    <div class="form-group">
                        <input type="text"
                         class="form-control"
                         name="title"
                         value = "{{old('title')}}"
                         placeholder="@lang('site.enterT')" >
                    </div>
                    <div class="form-group">
                        <textarea placeholder="@lang('site.enterD')"
                         class="form-control"
                         name="description"
                         row="3"> </textarea>
                    <div class="form-group text-center my-2">
                       <button type="submit" class="btn btn-success" style="width: 40%">@lang('site.creat')</button>
                    </div>
                    </div>
                 </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
