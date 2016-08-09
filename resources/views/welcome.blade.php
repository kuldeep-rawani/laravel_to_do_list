@extends('layout')

@section('content')
  
  @foreach ($cards as $card)
    <div>
      {{ $card->id }}
    </div>
    @endforeach


@stop
