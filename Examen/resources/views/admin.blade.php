@extends('layouts.app')

@section('title', 'Flights')

@section('content')

  <h2>Coming flights:</h2>

  <table>
      
    <tr>
      <th>Name</th>
      <th>Date</th>
      <th>Origin</th>
      <th>Destiny</th>
      <th>Available Seats</th>
    </tr>
    @if(count($vuelos) > 0)
    @foreach($vuelos as $vuelo)
    <tr>
      <th>{{ $vuelo->name }}</th>
      <th>{{ $vuelo->date }}</th>
      <th>{{ $vuelo->origin }}</th>
      <th>{{ $vuelo->destiny }}</th>
      <th>{{ $vuelo->available_seats }}</th>
    </tr>
    @endforeach
    @endif
  </table>

@endsection
