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
        <h3 class="card-title">Detail Pemakaian BBM & Pelumas</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailPemBbm.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_head_p_bbm" id="id_head_p_bbm" value="{{ $getHeaderPemBbm->id }}">
        <input type="hidden" name="no_ref" id="no_ref" value="{{ $getHeaderPemBbm->no_ref }}">        
        <input type="hidden" name="no_sppb" id="no_sppb" value="{{ $getHeaderPemBbm->no_bpm }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderPemBbm->kode_periode }}">
        <input type="hidden" name="kd_area" id="kd_area" value="{{ $getHeaderPemBbm->kd_area }}">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No Ref :</label><br/>
                  <span style="color:blue;">{{ $getHeaderPemBbm->no_ref }} {{ $getHeaderPemBbm->kode_periode }}</span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>No BPM :</label><br/>                
                  <span style="color:blue;">{{ $getHeaderPemBbm->no_bpm }}</span><br/>
                  {{ $getHeaderPemBbm->nmfa }}
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Area :</label><br/>
                  <span style="color:blue;">{{ $getHeaderPemBbm->kd_area }}</span><br/>
                  {{ $getHeaderPemBbm->nmarea }}
              </div>
            </div>          
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode Brg</label>
                  <input type="text" data-toggle="modal" data-target="#modInv" class="form-control" id="kd_brg" name="kd_brg" placeholder="klik disini.." readonly>
                  
              </div>
            </div>            
            <div class="col-sm-4">
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
            <div class="col-sm-5">
              <div class="form-group">
                <label>Jenis Alat/Unit</label>
                  <select class="form-control select2" name="jns_alat" id="jns_alat" style="width: 100%;">
                    <option value="" selected="selected">-- Lokasi --</option>
                    @foreach ($gjam as $ja)
                      <option value="{{ $ja->kode_jnsAlatMerk }}">{{ $ja->keterangan }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Jumlah</label>
                  <input type="number" class="form-control" id="jumQty" name="jumQty">
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
                  <input type="text" class="form-control" id="hrg_beli" name="hrg_beli" readonly>
              </div>
            </div>                      
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Kode F/A</label>                  
                  <select class="form-control select2" name="kd_fa" id="kd_fa" style="width: 100%;">
                    @foreach ($fixedAsset as $fa)
                      <option value="{{ $fa->kode_fa }}">{{ $fa->kode_fa }} - {{ $fa->nama_fa }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Status Pemakaian</label>
                  <input type="text" data-toggle="modal" data-target="#modSp" class="form-control" id="sts_pakai" name="sts_pakai" placeholder="klik dsini.." readonly>
                  <input type="hidden" id="kode_sp" name="kode_sp" readonly>
              </div>
            </div>            
          </div>
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" name="tgl_det_p_bbm" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>HMKM Awal</label>
                  <input type="number" class="form-control" id="hmkm_awal" name="hmkm_awal">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>HMKM Akhir</label>
                  <input type="number" class="form-control" id="hmkm_akhir" name="hmkm_akhir">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kerja Alat</label>
                  <input type="number" class="form-control" id="krj_alat" name="krj_alat" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Rata2</label>
                  <input type="number" class="form-control" id="rata_rata" name="rata_rata" readonly>
              </div>
            </div>
          </div>
          <div class="row">            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Lokasi Activity</label>
                  <select class="form-control select2" name="kode_lokasi" id="kode_lokasi" style="width: 100%;">
                    <option value="" selected="selected">-- Lokasi --</option>
                    @foreach ($lokasi as $lk)
                      <option value="{{ $lk->kode_lokasi }}">{{ $lk->nama_lokasi }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Aktivitas Alat</label>
                  <select class="form-control select2" name="kode_akv" id="kode_akv" style="width: 100%;">
                    <option value="" selected="selected">-- Aktivitas Alat --</option>
                    @foreach ($aktivAlat as $akal)
                      <option value="{{ $akal->kode_akv }}">{{ $akal->nama_akv }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
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
        <table id="trDetailPemBbm" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Nama Brg</th>
            <th>Ukuran/PartNo</th>
            <th>Jenis Alat</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Kode F/A</th>
            <th>Status Pemakaian</th>
            <th>Tanggal</th>
            <th>HMKM Awal</th>
            <th>HMKM Akhir</th>
            <th>Kerja Alat</th>
            <th>Rata-rata</th>
            <th>Lokasi Aktivitas</th>
            <th>Aktivitas Alat</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailPbbm as $gdpb)
            <tr>              
                <td>{{ $gdpb->kdbrg }}</td>
                <td>{{ $gdpb->part_numb }}</td>
                <td>{{ $gdpb->ukuran }}</td>
                <td>{{ $gdpb->nmJnsAlat }}</td>
                <td>{{ $gdpb->jumlah }}</td>
                <td>{{ $gdpb->uom }}</td>
                <td>{{ $gdpb->hrg_beli }}</td>
                <td>{{ $gdpb->kdfa }} - {{ $gdpb->nmfa }}</td>
                <td>{{ $gdpb->kdsp }} - {{ $gdpb->ketsp }}</td>
                <td>{{ $gdpb->tgl_det_p_bbm }}</td>
                <td>{{ $gdpb->hmkm_awal }}</td>
                <td>{{ $gdpb->hmkm_akhir }}</td>
                <td>{{ $gdpb->krj_alat }}</td>
                <td>{{ $gdpb->rata_rata }}</td>
                <td>{{ $gdpb->kdlok }} - {{ $gdpb->nmlok }}</td>
                <td>{{ $gdpb->kdakv }} - {{ $gdpb->nmakv }}</td>
                <td>{{ $gdpb->keterangan }}</td>
                <td>                
                  <a href="#" data-toggle="modal"
                  data-target="#modalEdit"
                  data-id="{{ $gdpb->id }}"
                  class="edit btn btn-primary btn-sm editDetSa" title="Edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gdpb->id }}" data-kode="{{ $gdpb->kd_brg }}" class="btn btn-danger btn-sm delDetSa" title="Delete"><i class="fa fa-trash"></i></a>
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
                        <table id="stInvBbm" class="table table-bordered table-striped responsive">
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
                <form action="{{ route('trDetailPemBbm.del') }}" method="post">
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

var hrg_beli = document.getElementById("hrg_beli");
hrg_beli.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  hrg_beli.value = formatRupiah(this.value, "");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    hrg_beli = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    hrg_beli += separator + ribuan.join(".");
  }

  hrg_beli = split[1] != undefined ? hrg_beli + "," + split[1] : hrg_beli;
  return prefix == undefined ? hrg_beli : hrg_beli ? "" + hrg_beli : "";
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
    
    $('#kd_fa').val(kode_fa);
    $('#nama_fa').val(nama_fa);
    $('#modFa').modal('hide');
});

$(document).on('click', '.clickSp', function() {
    var kode_sp = $(this).attr('data-kode_sp');
    var nama_sp = $(this).attr('data-nama_sp');
    
    $('#kode_sp').val(kode_sp);
    $('#sts_pakai').val(nama_sp);
    $('#modSp').modal('hide');
});

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$("#trDetailPemBbm").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailPemBbm_wrapper .col-md-6:eq(0)');

$(function () {
  $("#jumQty, #hmkm_awal, #hmkm_akhir").keyup(function () {
    var jumQty = parseInt($("#jumQty").val() || 0);
    var hmkm_awal = parseInt($("#hmkm_awal").val() || 0);
    var hmkm_akhir = parseInt($("#hmkm_akhir").val() || 0);
    var krj_alat = parseInt(hmkm_akhir - hmkm_awal);
    var rata2 = parseInt(jumQty / krj_alat);
    $("#krj_alat").val(krj_alat);
    $("#rata_rata").val(rata2);
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
//         url: "{{URL::to('trDetailPemBbm/showinv')}}"
//     }).done( function( response ) {
//         $('#showForm').html(response.html);
//     });
// });

$('#stInvBbm').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvBbm.data') !!}', // memanggil route yang menampilkan data json
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
//         url: "{{ URL::to('trDetailPemBbm/showedit')}}"+"/"+id
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