@extends('layouts.master')

@section('content')

<div class="container center-align">

    <h1>Dashboard</h1>
    
    <h1>Ventas: ${{ number_format($daySales->total) }} en {{ number_format($daySales->quantity) }} prendas<h1>

    <div class="row">
      <div class="col s12 l4">
        {!! $charts[0]->html() !!} <br>
      </div>
      <div class="col s12 l4">
        {!! $charts[1]->html() !!} <br>
      </div>
      <div class="col s12 l4">
      {!! $charts[2]->html() !!} <br>
      </div>
    </div>

    <div class="row">
      <div class="col s12 l4">
        {!! $charts[3]->html() !!} <br>
      </div>
      <div class="col s12 l4">
        {!! $charts[4]->html() !!} <br>
      </div>
      <div class="col s12 l4">
        {!! $charts[5]->html() !!} <br>
      </div>
    </div>

</div>

{!! Charts::scripts() !!}
@foreach ($charts as $chart)
  {!! $chart->script() !!}
@endforeach

@endsection