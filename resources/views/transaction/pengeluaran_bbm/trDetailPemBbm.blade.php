@extends('template')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Default box -->
    <br>
    @if(session('success'))
      <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if(session('error'))
      <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('error') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Detail Pemakaian Sparepart & BBM</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailPemSpBbm.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_head_p_spbbm" id="id_head_p_spbbm" value="{{ $getHeaderPsb->id }}">
        <input type="hidden" name="no_ref" id="no_ref" value="{{ $getHeaderPsb->no_ref }}">
        <input type="hidden" name="tgl_det_p_spbbm" id="tgl_det_p_spbbm" value="{{ $getHeaderPsb->tgl_p_sp_bbm }}">
        <input type="hidden" name="no_sppb" id="no_sppb" value="{{ $getHeaderPsb->no_bpm }}">
        <input type="hidden" name="supplier" id="supplier" value="{{ $getHeaderPsb->supplier }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderPsb->kode_periode }}">
        <input type="hidden" name="kd_area" id="kd_area" value="{{ $getHeaderPsb->kd_area }}">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No Ref :</label><br/>
                  {{ $getHeaderPsb->no_ref }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>No BPM :</label><br/>                
                  {{ $getHeaderPsb->no_bpm }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl Pemakaian :</label><br/>                
                  {{ $getHeaderPsb->tgl_p_sp_bbm }}
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Lokasi :</label><br/>
                  {{ $getHeaderPsb->loc_activity }}
              </div>
            </div>          
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode Brg</label>
                  <input type="text" data-toggle="modal" data-target="#modInv" class="form-control" id="kd_brg" name="kd_brg" readonly>
                  
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>
                  <input type="text" class="form-control" id="part_numb" name="part_numb" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" id="ukuran" name="ukuran" readonly>          
              </div>
            </div> 
            <div class="col-sm-2">
              <div class="form-group">
                <label>Merk</label>                
                  <input type="text" class="form-control" id="merk" name="merk" readonly>          
              </div>
            </div>           
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Jenis Alat/Unit</label>
                  <input type="text" class="form-control" id="ket" name="ket" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Jumlah</label>
                  <input type="number" class="form-control" id="qty" name="qty">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Satuan</label>
                  <input type="text" class="form-control" id="uom" name="uom" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga Beli</label>
                  <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" readonly>
              </div>
            </div>                      
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode F/A</label>
                  <input type="text" data-toggle="modal" data-target="#modFa" class="form-control" id="kode_fa" name="kode_fa" readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>F/A Name</label>
                  <input type="text" class="form-control" id="nama_fa" name="nama_fa" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Status Pemakaian</label>
                  <input type="text" data-toggle="modal" data-target="#modSp" class="form-control" id="nama_sp" name="sts_pakai" readonly>
              </div>
            </div>            
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $getHeaderPsb->tgl_p_sp_bbm }}" readonly>
              </div>
            </div>
          </div>
        <!-- /.card-body -->
        </div>

        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>              
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="trDetailSaldoAwal" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Ukuran/PartNo</th>  
            <th>Nama Brg</th>          
            <th>Jumlah</th>            
            <th>Satuan</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailPsb as $gds)
            <tr>              
                <td>{{ $gds->kdbrg }}</td>
                <td>{{ $gds->ukuran }}</td>
                <td>{{ $gds->part_numb }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ $gds->harga_satuan }}</td>
                <td>{{ $gds->total }}</td>
                <td>                
                  <a href="#" data-toggle="modal"
                  data-target="#modalEdit"
                  data-id="{{ $gds->id }}"
                  class="edit btn btn-primary btn-sm editDetSa" title="Edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gds->id }}" data-kode="{{ $gds->kd_brg }}" class="btn btn-danger btn-sm delDetSa" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInv" tabindex="-1" aria-labelledby="modInv" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvSpBbm" class="table table-bordered table-striped responsive">
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

    <!-- Modal FixedAsset Show -->
    <div class="modal fade" id="modFa" tabindex="-1" aria-labelledby="modFa" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dtStatic" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Kode </th>
                            <th>Nama Fixed Asset</th>
                            <th>#</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($fixedAsset as $fa)
                            <tr>              
                                <td>{{ $fa->kode_fa }}</td>
                                <td>{{ $fa->nama_fa }}</td>
                                <td><a href="#" data-kode_fa="{{ $fa->kode_fa }}" 
                                        data-nama_fa="{{ $fa->nama_fa }}" 
                                        class="btn btn-primary btn-sm clickFa" title="pilih">PILIH</a></td>
                            </tr>
                            @endforeach                     
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal FixedAsset Show -->

    <!-- Modal StsPemakaian Show -->
    <div class="modal fade" id="modSp" tabindex="-1" aria-labelledby="modSp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dtStatic" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>#</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($stsPemakaian as $etr)
                            <tr>              
                                <td>{{ $etr->kode }}</td>
                                <td>{{ $etr->keterangan }}</td>
                                <td><a href="#" data-kode_sp="{{ $etr->kode }}" 
                                        data-nama_sp="{{ $etr->keterangan }}" 
                                        class="btn btn-primary btn-sm clickSp" title="pilih">PILIH</a></td>
                            </tr>
                            @endforeach                     
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>Kode</th>
                            <th>Keterangan</th>
                          </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal FixedAsset Show -->

    <!-- Modal EDiT Show -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-header">Edit Form
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="editForm"></div>           
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal EDiTShow -->

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('trDetailSaldoAwal.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus
                      <span id="dakod"></span> ?
                      <input type='hidden' name='del_id' id='id-destroy'>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('custom-js')
<script type="text/javascript">
//$('.select2-basic').select2();

var harga_satuan = document.getElementById("harga_satuan");
harga_satuan.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  harga_satuan.value = formatRupiah(this.value, "");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    harga_satuan = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    harga_satuan += separator + ribuan.join(".");
  }

  harga_satuan = split[1] != undefined ? harga_satuan + "," + split[1] : harga_satuan;
  return prefix == undefined ? harga_satuan : harga_satuan ? "" + harga_satuan : "";
}

$("#dtStatic").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": false
}).buttons().container().appendTo('#dtStatic_wrapper .col-md-6:eq(0)'); 

$(document).on('click', '.clickInv', function() {
    var id = $(this).attr('data-id');
    var kdbrg = $(this).attr('data-kdbrg');
    var kelbrg = $(this).attr('data-kelbrg');
    var partnumb = $(this).attr('data-partnumb');
    var uk = $(this).attr('data-uk');
    var uom = $(this).attr('data-uom');
    var merk = $(this).attr('data-merk');
    var ket = $(this).attr('data-ket');
    
    $('#id').val(id);
    $('#kd_brg').val(kdbrg);
    $('#kel_brg').val(kelbrg);
    $('#part_numb').val(partnumb);
    $('#ukuran').val(uk);
    $('#uom').val(uom);
    $('#merk').val(merk);
    $('#ket').val(ket);
    $('#modInv').modal('hide');
});

$(document).on('click', '.clickFa', function() {
    var kode_fa = $(this).attr('data-kode_fa');
    var nama_fa = $(this).attr('data-nama_fa');
    
    $('#kode_fa').val(kode_fa);
    $('#nama_fa').val(nama_fa);
    $('#modFa').modal('hide');
});

$(document).on('click', '.clickSp', function() {
    var kode_sp = $(this).attr('data-kode_sp');
    var nama_sp = $(this).attr('data-nama_sp');
    
    $('#kode_sp').val(kode_sp);
    $('#nama_sp').val(nama_sp);
    $('#modSp').modal('hide');
});

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$("#trDetailSaldoAwal").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailSaldoAwal_wrapper .col-md-6:eq(0)');

$(function () {
  $("#qty , #harga_satuan").keyup(function () {
    var qty = parseInt($("#qty").val() || 0);
    var h_s = parseInt($("#harga_satuan").val() || 0);
    var total = parseInt(qty * h_s);
    
    $("#total").val(total);
  });
});

$("body").on('keyup', "#qty-m , #harga_satuan-m", function() {  
    var qty = parseInt($("#qty-m").val() || 0);
    var h_s = parseInt($("#harga_satuan-m").val() || 0);
    var total = parseInt(qty * h_s);
    //alert(qty);
    
    $("#total-m").val(total);
});

// $(document).on('click', '.xmodInv', function() {

//     $.ajax({
//         type: 'GET',
//         url: "{{URL::to('trDetailPemSpBbm/showinv')}}"
//     }).done( function( response ) {
//         $('#showForm').html(response.html);
//     });
// });

$('#stInvSpBbm').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvSpBbm.data') !!}', // memanggil route yang menampilkan data json
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
        searchable: false
    }
  ],
});

// $(document).on('click', '.editDetSa', function() {
//     let id = $(this).attr('data-id');

//     $.ajax({
//         type: 'GET',
//         url: "{{ URL::to('trDetailSaldoAwal/showedit')}}"+"/"+id
//     }).done( function( response ) {
//         $('#editForm').html(response.html);
//     });
// });

// $(document).on('click', '.delDetSa', function() {
//     let id = $(this).attr('data-id');
//     let dakod = $(this).attr('data-kode');
//     $('#id-destroy').val(id);
//     $('#dakod').html(dakod);
//     alert(id);
// });
</script> 
@stop