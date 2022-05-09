@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/fullcalendar/lib/main.min.css') }}">
@endsection

@section('page-title', 'Dashboard')

@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="card col-lg-6 mt-4">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/fullcalendar/lib/main.min.js') }}"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        initialView: 'dayGridMonth',
      });
      calendar.render();
    });

  </script>
@endsection
