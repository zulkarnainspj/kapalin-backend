@extends('employee.layout.main')
@section('container')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/employee/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Validasi Pembayaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->

    <section class="container-fluid">
        <!-- Page Title-->
        <h2 class="fs-3 fw-bold my-3">Validasi Pembayaran</h2>
        <!-- / Page Title-->

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Kode Booking</th>
                                    <th>Harga</th>
                                    <th>Nama</th>
                                    <th>Bank</th>
                                    <th>No Rekening</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <a href="#" class="mr-2" onclick="getTicketInformation('{{ $item->ticket[0]->ticket_code }}')" data-bs-toggle="modal"
                                                data-bs-target="#ticketModal">
                                                {{ $item->ticket[0]->ticket_code }}
                                            </a>
                                        </td>
                                        <td class="text-center">{{ 'Rp ' . number_format($item->ticket[0]->price, 0, ',', '.') }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->bank }}</td>
                                        <td class="text-center">{{ $item->account_number }}</td>
                                        <td class="text-center">
                                            @php
                                                // 0 Batal, 1 Dipesan, 2 Check In, 3 Selesai
                                                $badge_bg = '';
                                                $text_color = '';
                                                $text = '';
                                                
                                                if ($item->status == 1) {
                                                    $badge_bg = 'bg-warning-faded';
                                                    $text_color = 'text-warning';
                                                    $text = 'Menunggu Pembayaran';
                                                } elseif ($item->status == 2) {
                                                    $badge_bg = 'bg-warning-faded';
                                                    $text_color = 'text-warning';
                                                    $text = 'Pending';
                                                } elseif ($item->status == 3) {
                                                    $badge_bg = 'bg-success-faded';
                                                    $text_color = 'text-success';
                                                    $text = 'selesai';
                                                } elseif ($item->status == 0) {
                                                    $badge_bg = 'bg-danger-faded';
                                                    $text_color = 'text-danger';
                                                    $text = 'batal';
                                                }
                                                
                                            @endphp
                                            <span
                                                class="badge rounded-pill {{ $badge_bg . ' ' . $text_color }}">{{ $text }}</span>
                                        </td>
                                        <td align="center">
                                            <a href="#" class="btn btn-sm btn-primary mr-1" data-bs-toggle="modal"
                                                    data-bs-target="#receiptModal" onclick="showReceipt('{{ $item->receipt }}')" title="Lihat Bukti">
                                                    <i class="bi bi-receipt"></i></a>

                                            @if ($item->status == 2)
                                                <a href="{{ route('employee-payment-confirm', [$item->ticket[0]->ticket_code, $item->id]) }}" onclick="return confirm('Konfirmasi pembayaran?');"
                                                    class="btn btn-sm btn-success text-light mr-1" title="Verifikasi">
                                                    <i class="bi bi-check-circle-fill"></i></a>

                                                <a href="{{ route('employee-payment-reject', [$item->ticket[0]->ticket_code, $item->id]) }}" onclick="return confirm('Tolak pembayaran?');" class="btn btn-sm btn-danger text-light mr-1"
                                                    title="Tolak">
                                                    <i class="bi bi-x-circle-fill"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin-class-store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ticketModalLabel">Informasi Tiket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>Pemesan</th>
                                <td><p class="m-0" id="pemesan"></p></td>
                            </tr>

                            <tr>
                                <th>Kapal</th>
                                <td><p class="m-0" id="kapal"></p></td>
                            </tr>
                            
                            <tr>
                                <th>Rute</th>
                                <td><p class="m-0" id="rute"></p></td>
                            </tr>

                            <tr>
                                <th>ETD</th>
                                <td><p class="m-0" id="etd"></p></td>
                            </tr>

                            <tr>
                                <th>Penumpang</th>
                                <td><p class="m-0" id="penumpang"></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin-class-store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="receiptModalLabel">Bukti Transfer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="receipt" style="width:100%; height:auto" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showReceipt(x){
            $('#receipt').attr('src', "{{ url('') }}/storage/" + x);
        }
    </script>
@endsection
