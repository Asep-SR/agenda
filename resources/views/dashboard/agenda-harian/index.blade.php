@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/fullcalendar/lib/main.min.css') }}">
@endsection

@section('page-title', 'Agenda Harian')

@section('content')
<div class="main-content-inner">
    {{-- Alert --}}
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show py-4" role="alert">
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
          <h5 class="modal-title" id="tambahAgendaModalLabel">Tambah Agenda</h5>
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
                <div class="form-group">
                    <label for="file">File</label>
                    <br>
                    <input type="file" class="file-upload-info file" id="file" name="file">
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

{{-- Modal Lihat Agenda --}}
<div class="modal fade" id="lihatAgenda" tabindex="-1" role="dialog" aria-labelledby="lihatAgendaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lihatAgendaModalLabel">Detail Agenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="w-25">Nama Instansi</th>
                            <td id="detailSKPD"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Nama Agenda</th>
                            <td id="detailAgenda"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Waktu Mulai</th>
                            <td id="detailStart"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Waktu Selesai</th>
                            <td id="detailEnd"></td>
                        </tr>
                        <tr>
                            <th class="w-25">File</th>
                            <td id="detailFile"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a data-toggle="modal" href="#editAgenda" class="btn btn-primary">Edit</a>
        </div>
      </div>
    </div>
</div>

{{-- Modal Edit Agenda --}}
<div class="modal fade" id="editAgenda" tabindex="-1" role="dialog" aria-labelledby="editAgendaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAgendaModalLabel">Edit Agenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formAgenda" method="post" action="/dashboard/agenda-harian">
            @csrf
                <div class="form-group">
                  <label for="namaSKPD">Instansi</label>
                  <input type="text" class="form-control" id="editNamaSKPD" aria-describedby="namaSKPD" name="namaSKPD" disabled>
                </div>
                <div class="form-group">
                  <label for="namaAgenda">Nama Agenda</label>
                  <input type="text" class="form-control" id="editNamaAgenda" name="namaAgenda">
                </div>
                <div class="form-group">
                    <label for="start">Waktu Mulai</label>
                    <input type="text" class="form-control datetimepicker-input" id="editStart" name="start" data-toggle="datetimepicker" data-target="#start">
                </div>
                <div class="form-group">
                    <label for="start">Waktu Selesai</label>
                    <input type="text" class="form-control datetimepicker-input" id="editEnd" name="end" data-toggle="datetimepicker" data-target="#end">
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <br>
                    <input type="file" class="file-upload-info file" id="file" name="file">
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
        $('#editStart').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#editEnd').datetimepicker({
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
        eventSources: [
            '/dashboard/agenda-harian/fetch',
        ],
        eventClick: function(info) {
            // alert('Event: ' + info.event.title);
            $('#lihatAgenda').modal('show');
            $('#detailSKPD').html("-");
            $('#detailAgenda').html(info.event.title);
            $('#detailStart').html(generateDatabaseDateTime(info.event.start));
            $('#detailEnd').html(generateDatabaseDateTime(info.event.end));

            $('#editAgenda').on('shown.bs.modal', function (e) {
                $('#editNamaSKPD').val("-");
                $('#editNamaAgenda').val(info.event.title);
                $('#editStart').val(generateDatabaseDateTime(info.event.start));
                $('#editEnd').val(generateDatabaseDateTime(info.event.end));
            });

            function generateDatabaseDateTime(date) {
                return date.toISOString().replace("T"," ").substring(0, 16);
            }
        }
      });
      calendar.render();
    });


  </script>
@endsection
