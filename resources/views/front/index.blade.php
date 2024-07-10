@extends('layouts.app')
   @section('title' , 'All Todos')
   @section('content')
   <div class="container">
        <div class="row pt-3 justify-content-center">
             <div class="card" style="width:50%">
                <div class="card-header text-center">
                   <h1>@lang('site.All_Todos')</h1>
                   @include('layouts._session')

                   <a href="{{route('todo.create')}}">@lang('site.add')</a>
                </div>
                <div class="card-body">
                   <ul class="list-group">
                      @forelse($todos as $todo)
                     <li class="list-group-item text-muted">
                        {{ $todo->title }}
                        <span class="float-right">
                         <a href="{{route('todo.delete', $todo->id)}}" style="color:#f44336"><i class="fa fa-trash mr-2"></i></a>
                        </span>
                        <span class="float-right">
                         <a href="{{route('todo.edit' ,$todo->id)}}" style="color:#00bcd4"><i class="fa fa-edit mr-2"></i></a>
                        </span>
                        <span class="float-right">
                         <a href="{{route('todo.show',$todo)}}" style="color:#4caf50"><i class="fa fa-eye mr-2"></i></a>
                        </span>
                        @if(!$todo->completed)
                        <span class="float-right">
                         <a href="{{route('todo.complete',$todo)}}" style="color:#ff9800"><i class="fa fa-check mr-2"></i></a>
                        </span>
                        @endif
                     </li>
                     @empty
                        <p class="text-center">
                        No Todos yet
                        </p>
                     @endforelse
                   </ul>
                </div>
             </div>
        </div>
   </div>

   @endsection

