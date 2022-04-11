@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/fullcalendar/lib/main.min.css') }}">
@endsection

@section('content')
<div class="main-content-inner">
    <div class="row">
        <div id='calendar' class="col-lg-6 mt-4"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/fullcalendar/lib/main.min.js') }}"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>
@endsection
