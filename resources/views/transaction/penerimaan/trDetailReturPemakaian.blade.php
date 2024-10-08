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
        <h3 class="card-title">Detail Pindah Gudang - 23</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailReturPemakaian.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_head_retur_pemakaian" id="id_head_retur_pemakaian" value="{{ $getHeaderReturPemakaian->id }}">
        <input type="hidden" name="no_ref" id="no_ref" value="{{ $getHeaderReturPemakaian->no_ref }}">
        <input type="hidden" name="tgl_det_retur_pemakaian" id="tgl_det_retur_pemakaian" value="{{ $getHeaderReturPemakaian->tgl_retur }}">
        <input type="hidden" name="retur_p" id="retur_p" value="{{ $getHeaderReturPemakaian->retur_p }}">
        <input type="hidden" name="supplier" id="supplier" value="{{ $getHeaderReturPemakaian->supplier }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderReturPemakaian->kode_periode }}">
        <input type="hidden" name="kd_area" id="kd_area" value="{{ $getHeaderReturPemakaian->kd_area }}">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Ref :</label><br/>
                  {{ $getHeaderReturPemakaian->no_ref }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Retur :</label><br/>                
                  {{ $getHeaderReturPemakaian->retur_p }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl :</label><br/>                
                  {{ $getHeaderReturPemakaian->tgl_retur }}
              </div>
            </div>         
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Area :</label><br/>
                  {{ $getHeaderReturPemakaian->kd_area }}-{{ $getHeaderReturPemakaian->nmarea }}
              </div>
            </div>            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Keterangan :</label><br/>                
                  {{ $getHeaderReturPemakaian->keterangan }}
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
            <div class="col-sm-5">
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
          </div>
          <div class="row">            
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
                <label>Harga Satuan</label>
                  <input type="text" class="form-control" id="hrg_sat" name="hrg_satuan" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga Beli</label>
                  <input type="text" class="form-control" id="hrg_beli" name="hrg_beli" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Total</label>
                  <input type="text" class="form-control" id="total" name="total" readonly>
              </div>
            </div>                   
          </div>          
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" id="tgl_det_retur_pemakaian" name="tgl_det_retur_pemakaian" value="{{ $getHeaderReturPemakaian->tgl_retur }}" readonly>
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
        <table id="trDetailReturPemakaian" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Nama Brg</th> 
            <th>Ukuran/PartNo</th>            
            <th>Jumlah</th>           
            <th>Satuan</th>
            <th>Hrg Satuan</th>
            <th>Hrg Beli</th>
            <th>Total</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailReturPemakaian as $gds)
            <tr>              
                <td>{{ $gds->kdbrg }}</td>
                <td>{{ $gds->partnumb }}</td>
                <td>{{ $gds->ukuran }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ $gds->uom }}</td>
                <td>{{ number_format($gds->hrg_satuan,2,",",".") }}</td>
                <td>{{ number_format($gds->hrg_beli,2,",",".") }}</td>
                <td>{{ number_format($gds->total,2,",",".") }}</td>
                <td>{{ $gds->keterangan }}</td>
                <td>{{ $gds->tgl_det_retur_pemakaian }}</td>
                <td>                
                  <a href="#" data-toggle="modal" 
                  data-target="#modalEdit" 
                  data-id="{{ $gds->id }}"
                  data-id_head_retur_pemakaian="{{ $gds->id_head_retur_pemakaian }}"
                  data-kdbrg="{{ $gds->kdbrg }}" 
                  data-partnumb="{{ $gds->partnumb }}" 
                  data-uk="{{ $gds->ukuran }}"
                  data-qty="{{ $gds->qty }}" 
                  data-uom="{{ $gds->uom }}" 
                  data-hrg_sat="{{ $gds->hrg_satuan }}"
                  data-hrg_bel="{{ $gds->hrg_beli }}" 
                  data-total="{{ $gds->total }}"
                  data-keterangan="{{ $gds->keterangan }}" 
                  data-kode_periode="{{ $getHeaderReturPemakaian->kode_periode }}"
                  data-tgl_retur="{{ $getHeaderReturPemakaian->tgl_retur }}" class="edit btn btn-primary btn-sm editDetReturPemakaian" title="Edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gds->id }}" class="btn btn-danger btn-sm delDetReturPemakaian" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
                    <form class="form-horizontal" action="{{ route('trDetailReturPemakaian.edit') }}" method="POST">
                       @csrf
                      <input type="hidden" class="form-control" id="idx" name="id">
                      <input type="hidden" name="id_head_retur_pemakaianx" id="id_head_retur_pemakaian">
                      <input type="hidden" name="kode_periodex" id="kode_periode">
                      <div class="card-body">          
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Kode Brg</label>
                                <input type="text" data-toggle="modal" data-target="#modInvx" class="form-control" id="kd_brgx" name="kd_brg" placeholder="klik disini..">
                                
                            </div>
                          </div>            
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label>Nama Brg</label>
                                <input type="text" class="form-control" id="part_numbx" name="part_numb" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Ukuran</label>                
                                <input type="text" class="form-control" id="ukuranx" name="ukuran" readonly>          
                            </div>
                          </div>                          
                        </div>
                        <div class="row">                          
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Jumlah</label>
                                <input type="number" class="form-control" id="qtyx" name="qty">
                            </div>
                          </div>
                          <div class="col-sm-1">
                            <div class="form-group">
                              <label>Satuan</label>
                                <input type="text" class="form-control" id="uomx" name="uom" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Harga Satuan</label>
                                <input type="text" class="form-control" id="hrg_satuanx" name="hrg_satuan" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Harga Beli</label>
                                <input type="text" class="form-control" id="hrg_belix" name="hrg_beli" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Total</label>
                                <input type="text" class="form-control" id="totalx" name="total" readonly>
                            </div>
                          </div>                     
                        </div>                        
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Keterangan</label>
                                <input type="text" class="form-control" id="keteranganx" name="keterangan">
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal</label>
                                <input type="text" class="form-control" id="tglx" name="tgl_det_retur_pemakaian" readonly>
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
            </div>
        </div>
    </div>
    <!-- END Modal EDiTShow -->

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInv" tabindex="-1" aria-labelledby="modInv" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvReturPemakaian" class="table table-bordered table-striped responsive">
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

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInvx" tabindex="-1" aria-labelledby="modInvx" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvReturPemakaian_x" class="table table-bordered table-striped responsive">
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
                <form action="{{ route('trDetailReturPemakaian.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus ID 
                      <span id="id-destroy2"></span> ?
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

// var hrg_beli = document.getElementById("hrg_beli");
// hrg_beli.addEventListener("keyup", function(e) {
//   // tambahkan 'Rp.' pada saat form di ketik
//   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
//   hrg_beli.value = formatRupiah(this.value, "");
// });

/* Fungsi formatRupiah */
// function formatRupiah(angka, prefix) {
//   var number_string = angka.replace(/[^,\d]/g, "").toString(),
//     split = number_string.split(","),
//     sisa = split[0].length % 3,
//     hrg_beli = split[0].substr(0, sisa),
//     ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//   // tambahkan titik jika yang di input sudah menjadi angka ribuan
//   if (ribuan) {
//     separator = sisa ? "." : "";
//     hrg_beli += separator + ribuan.join(".");
//   }

//   hrg_beli = split[1] != undefined ? hrg_beli + "," + split[1] : hrg_beli;
//   return prefix == undefined ? hrg_beli : hrg_beli ? "" + hrg_beli : "";
// }

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
    // var hrg_sat = $(this).attr('data-hrg_sat');
    var qty_temp = $(this).attr('data-qty');
    var nilai = $(this).attr('data-nilai');
    var hrg_sat = nilai/qty_temp;
    var hrg_sat_x = parseFloat(hrg_sat.toFixed(4));
    // alert(hrg_sat);
    
    $('#id').val(id);
    $('#kd_brg').val(kdbrg);
    $('#kel_brg').val(kelbrg);
    $('#part_numb').val(partnumb);
    $('#ukuran').val(uk);
    $('#uom').val(uom);
    $('#hrg_sat').val(hrg_sat_x);
    $('#modInv').modal('hide');
});

$(document).on('click', '.clickInv_x', function() {
    var id = $(this).attr('data-id');
    var kdbrg = $(this).attr('data-kdbrg');
    var kelbrg = $(this).attr('data-kelbrg');
    var partnumb = $(this).attr('data-partnumb');
    var uk = $(this).attr('data-uk');
    var uom = $(this).attr('data-uom');
    var hrg_sat = $(this).attr('data-hrg_sat');
    
    $('#id').val(id);
    $('#kd_brgx').val(kdbrg);
    $('#kel_brgx').val(kelbrg);
    $('#part_numbx').val(partnumb);
    $('#ukuranx').val(uk);
    $('#uomx').val(uom);
    $('#hrg_satuanx').val(hrg_sat);
    $('#modInvx').modal('hide');
});

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$("#trDetailReturPemakaian").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailReturPemakaian_wrapper .col-md-6:eq(0)');

$(function () {
  $("#qty , #hrg_satuan").keyup(function () {
    var qty = parseInt($("#qty").val() || 0);
    var h_s = parseInt($("#hrg_sat").val() || 0);
    var total = parseInt(qty * h_s);
    var h_beli = parseInt(qty * h_s);
    
    $("#hrg_beli").val(h_beli);
    $("#total").val(total);
  });
});

$("body").on('keyup', "#qtyx , #hrg_satuanx", function() {  
    var qty = parseInt($("#qtyx").val() || 0);
    var h_s = parseInt($("#hrg_satuanx").val() || 0);
    var total = parseInt(qty * h_s);
    var h_beli = parseInt(qty * h_s);
    //alert(qty);
    
    $("#hrg_belix").val(total);
    $("#totalx").val(total);
});

// $(document).on('click', '.xmodInv', function() {

//     $.ajax({
//         type: 'GET',
//         url: "{{URL::to('trDetailReturPemakaian/showinv')}}"
//     }).done( function( response ) {
//         $('#showForm').html(response.html);
//     });
// });

$('#stInvReturPemakaian').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvReturPemakaian.data') !!}', // memanggil route yang menampilkan data json
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

$('#stInvReturPemakaian_x').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvReturPemakaianx.data') !!}', // memanggil route yang menampilkan data json
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

$(document).on('click', '.editDetReturPemakaian', function() {
    let id = $(this).attr('data-id');
    let id_head_retur_pemakaian = $(this).attr('data-id_head_retur_pemakaian');
    let kdbrg = $(this).attr('data-kdbrg');
    var kelbrg = $(this).attr('data-kelbrg');
    let partnumb = $(this).attr('data-partnumb');
    let uk = $(this).attr('data-uk');
    let uom = $(this).attr('data-uom');
    let qty = $(this).attr('data-qty');
    let ket = $(this).attr('data-ket');        
    let hrg_sat = $(this).attr('data-hrg_sat');
    let hrg_bel = $(this).attr('data-hrg_bel');
    let total = $(this).attr('data-total');
    let keterangan = $(this).attr('data-keterangan');
    let tgl_retur = $(this).attr('data-tgl_retur');
    // alert(tgl_retur);
    
    $('#idx').val(id);
    $('#id_head_retur_pemakaianx').val(id_head_retur_pemakaian);
    $('#kd_brgx').val(kdbrg);
    $('#kel_brgx').val(kelbrg);
    $('#part_numbx').val(partnumb);
    $('#ukuranx').val(uk);
    $('#uomx').val(uom);
    $('#qtyx').val(qty);
    $('#ketx').val(ket);
    $('#hrg_satuanx').val(hrg_sat);
    $('#hrg_belix').val(hrg_bel);
    $('#totalx').val(total);
    $('#keteranganx').val(keterangan);
    $('#tglx').val(tgl_retur);
    // $("#jns_kayu_m").val(ky).trigger('change');
            
});

$(document).on('click', '.delDetReturPemakaian', function() {
    let id = $(this).attr('data-id');
    $('#id-destroy').val(id);
    $('#id-destroy2').html(id);
});

// $(document).on('click', '.editDetReturPemakaian', function() {
//     let id = $(this).attr('data-id');

//     $.ajax({
//         type: 'GET',
//         url: "{{ URL::to('trDetailReturPemakaian/showedit')}}"+"/"+id
//     }).done( function( response ) {
//         $('#editForm').html(response.html);
//     });
// });

</script> 
@stop