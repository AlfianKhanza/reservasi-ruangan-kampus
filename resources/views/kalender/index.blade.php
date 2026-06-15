@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">
        <h4 class="mb-0">Kalender Reservasi</h4>
    </div>

    <div class="card-body">
        <div id="calendar"></div>
    </div>

</div>

<!-- Modal Detail Reservasi -->
<div class="modal fade" id="detailModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">
                    Detail Reservasi
                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body" id="detailBody">

            </div>

        </div>

    </div>

</div>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/main.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale: 'id',

        height: 700,

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        events: @json($events),

        eventClick: function(info) {

            let data = info.event.extendedProps;

            document.getElementById('detailBody').innerHTML = `

                <div class="alert alert-primary">

                    <h4 class="mb-0">
                        🏢 ${data.ruangan}
                    </h4>

                </div>

                <table class="table table-bordered">

                    <tr>
                        <th width="30%">Peminjam</th>
                        <td>${data.peminjam}</td>
                    </tr>

                    <tr>
                        <th>Tanggal</th>
                        <td>
                            ${info.event.start.toLocaleDateString('id-ID',{
                                day:'numeric',
                                month:'long',
                                year:'numeric'
                            })}
                        </td>
                    </tr>

                    <tr>
                        <th>Jam Mulai</th>
                        <td>${data.jam_mulai.substring(0,5)} WIB</td>
                    </tr>

                    <tr>
                        <th>Jam Selesai</th>
                        <td>${data.jam_selesai.substring(0,5)} WIB</td>
                    </tr>

                    <tr>
                        <th>Keperluan</th>
                        <td>${data.keperluan}</td>
                    </tr>

                </table>

            `;

            new bootstrap.Modal(
                document.getElementById('detailModal')
            ).show();

        }

    });

    calendar.render();

});

</script>

@endsection