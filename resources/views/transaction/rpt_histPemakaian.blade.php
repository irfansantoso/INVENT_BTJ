@extends('template')
@section('content')
<div class="card card">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('histPemakaian.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Periode Bulan</label><br>
              <select class="form-control" name="bulan" id="bulan" style="width: 100%;">
                <option value="0"> - Pilih Bulan - </option>
                @foreach ($bulan as $key => $data) {
                  <option value="{{ $key+1 }}"> {{ $data }} </option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tahun</label>
              <input type="text" class="form-control" name="tahun" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Kode Brg</label>
              <input type="text" data-toggle="modal" data-target="#modInv" class="form-control" id="kd_brg" name="kd_brg" placeholder="Klik here.." readonly>
          </div>
        </div>
      </div>
    <!-- /.card-body -->
    </div>
    <div class="card-footer">
      <button class="btn btn-success">Submit</button>
    </div>
    <!-- /.card-footer -->

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInv" tabindex="-1" aria-labelledby="modInv" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvHp" class="table table-bordered table-striped responsive">
                          <thead>
                          <tr>
                            <th>Kd_Brg</th>
                            <th>Kel_Brg</th>
                            <th>Stock Akhir</th>
                            <th>Nama Brg</th>
                            <th>Ukuran</th>
                            <th>UOM</th>
                            <th>Merk</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Invent Stock Show -->
  </form>              
</div>
  <!-- /.card -->


@if(Session::get('getDetailPsb') != "")
<div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <h6 style="text-align:center;background-color: skyblue;padding: 5px 0 5px 0;">{{ session('title') }}</h6>
        <table id="tabHistPemakaian" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Nama Brg</th> 
            <th>Ukuran/PartNo</th>
            <th>Jumlah</th>           
            <th>Satuan</th>
            <th>Hrg Beli</th>
            <th>FixedAsset</th>
            <th>Tanggal</th>
          </tr>
          </thead>
          <tbody>
            @php 
              $getSelDt = Session::get('getDetailPsb');
            @endphp

            @foreach ($getSelDt as $jsnx)
            <tr>              
                <td>{{ $jsnx['kdbrg'] }}</td>
                <td>{{ $jsnx['partnumb'] }}</td>
                <td>{{ $jsnx['ukuran'] }}</td> 
                <td>{{ $jsnx['qty'] }}</td>
                <td>{{ $jsnx['uom'] }}</td>
                <td>{{ number_format($jsnx['hrg_beli'],2,",",".") }}</td>
                <td>{{ $jsnx['nmfa'] }}</td>
                <td>{{ $jsnx['tgl_det_p_spbbm'] }}</td>
                
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@else
  <div style="text-align:center;">No Data Found</div>
@endif

@if(Session::get('getDetailPbbm') != "")
<div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <h6 style="text-align:center;background-color: skyblue;padding: 5px 0 5px 0;">{{ session('title2') }}</h6>
        <table id="tabHistPemakaian2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Nama Brg</th> 
            <th>Ukuran/PartNo</th>
            <th>Jumlah</th>           
            <th>Satuan</th>
            <th>Hrg Beli</th>
            <th>FixedAsset</th>
            <th>Tanggal</th>
          </tr>
          </thead>
          <tbody>
            @php 
              $getSelDt2 = Session::get('getDetailPbbm');
            @endphp

            @foreach ($getSelDt2 as $jsnx2)
            <tr>              
                <td>{{ $jsnx2['kdbrg'] }}</td>
                <td>{{ $jsnx2['part_numb'] }}</td>
                <td>{{ $jsnx2['ukuran'] }}</td> 
                <td>{{ $jsnx2['jumlah'] }}</td>
                <td>{{ $jsnx2['uom'] }}</td>
                <td>{{ number_format($jsnx2['hrg_beli'],2,",",".") }}</td>
                <td>{{ $jsnx2['nmfa'] }}</td>
                <td>{{ $jsnx2['tgl_det_p_bbm'] }}</td>
                
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@else
  <div style="text-align:center;">No Data Found</div>
@endif

@stop
@section('custom-js')

<script type="text/javascript">

$(document).on('click', '.clickInv', function() {
    var kdbrg = $(this).attr('data-kdbrg');
    var uk = $(this).attr('data-uk');
    var pn = $(this).attr('data-partnumb');
    var uom = $(this).attr('data-uom');
    
    $('#kd_brg').val(kdbrg);
    $('#uom').val(uom);
    $('#part_numb').val(pn);
    $('#ukuran').val(uk);
    $('#modInv').modal('hide');
});

$("#tabHistPemakaian").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#tabHistPemakaian_wrapper .col-md-6:eq(0)');

$("#tabHistPemakaian2").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#tabHistPemakaian2_wrapper .col-md-6:eq(0)');

$('#stInvHp').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvHp.data') !!}', // memanggil route yang menampilkan data json
  columns: 
  [
    { // mengambil & menampilkan kolom sesuai tabel database
        data: 'kd_brg',
        name: 'kd_brg'
    },
    {
        data: 'kel_brg',
        name: 'kel_brg'
    },
    {
        data: 'qty',
        name: 'qty'
    },
    {
        data: 'part_numb',
        name: 'part_numb'
    },
    {
        data: 'ukuran',
        name: 'ukuran'
    },
    {
        data: 'uom',
        name: 'uom'
    },
    {
        data: 'merk',
        name: 'merk'
    },
    {
        data: 'action',
        name: 'action',
        orderable: false, 
        searchable: true
    }
  ],
});
</script>
@stop