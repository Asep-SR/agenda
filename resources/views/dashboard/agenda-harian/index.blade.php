@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/fullcalendar/lib/main.min.css') }}">
@endsection

@section('page-title', 'Agenda Harian')

@section('content')
<div class="main-content-inner">
    {{-- Alert --}}
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
    @endif
    {{-- Button Trigger Modal --}}
    <div class="mt-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#tambahAgenda">Tambah Agenda</button>
    </div>
    <div class="row">
        <div class="card col-lg-6 mt-3">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
        <div class="card col-lg-6 mt-3">
            <div class="card-header">
                <h3>Daftar Agenda</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Agenda --}}
<div class="modal fade" id="tambahAgenda" tabindex="-1" role="dialog" aria-labelledby="tambahAgendaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formAgenda" method="post" action="/dashboard/agenda-harian">
            @csrf
                <div class="form-group">
                  <label for="namaSKPD">Instansi</label>
                  <input type="text" class="form-control" id="namaSKPD" aria-describedby="namaSKPD" name="namaSKPD" disabled>
                </div>
                <div class="form-group">
                  <label for="namaAgenda">Nama Agenda</label>
                  <input type="text" class="form-control" id="namaAgenda" name="namaAgenda">
                </div>
                <div class="form-group">
                    <label for="start">Waktu Mulai</label>
                    <input type="text" class="form-control datetimepicker-input" id="start" name="start" data-toggle="datetimepicker" data-target="#start">
                </div>
                <div class="form-group">
                    <label for="start">Waktu Selesai</label>
                    <input type="text" class="form-control datetimepicker-input" id="end" name="end" data-toggle="datetimepicker" data-target="#end">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" form="formAgenda" class="btn btn-primary" value="Simpan">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
{{-- Tempus Dominus --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />

<script type="text/javascript">
    $(function () {
        $('#start').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#end').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
    });
</script>

{{-- FullCalendar.io --}}
<script src="{{ asset('assets/js/fullcalendar/lib/main.min.js') }}"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            center: 'dayGridMonth,listWeek' // buttons for switching between views
        },
        selectable: true,
        initialView: 'dayGridMonth',
        events: [
            { // this object will be "parsed" into an Event Object
            title: 'The Title', // a property!
            start: '2022-05-09 10:00', // a property!
            end: '2022-05-09 10:00' // a property! ** see important note below about 'end' **
            }
        ],
      });
      calendar.render();
    });

  </script>
@endsection
