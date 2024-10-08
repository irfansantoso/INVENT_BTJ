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
        <h3 class="card-title">Detail Pindah Gudang</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailPindahGudang.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_header_saldo_awal" id="id_header_saldo_awal" value="{{ $getHeaderSa->id }}">
        <input type="hidden" name="no_ref" id="no_ref" value="{{ $getHeaderSa->no_ref }}">
        <input type="hidden" name="tgl_det_sa" id="tgl_det_sa" value="{{ $getHeaderSa->tgl_sa }}">
        <input type="hidden" name="no_sppb" id="no_sppb" value="{{ $getHeaderSa->no_sppb }}">
        <input type="hidden" name="supplier" id="supplier" value="{{ $getHeaderSa->supplier }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderSa->kode_periode }}">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Ref :</label><br/>
                  {{ $getHeaderSa->no_ref }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Sppb :</label><br/>                
                  {{ $getHeaderSa->no_sppb }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl Saldo Awal :</label><br/>                
                  {{ $getHeaderSa->tgl_sa }}
              </div>
            </div>  
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode Area :</label><br/>                
                  {{ $getHeaderSa->kd_area }} - {{ $getHeaderSa->nmarea }}
              </div>
            </div>         
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Dari Area :</label><br/>                
                  {{ $getHeaderSa->from_kd_area }} - {{ $getHeaderSa->nmarea2 }}
              </div>
            </div>          
            <div class="col-sm-3">
              <div class="form-group">
                <label>Supplier :</label><br/>
                  {{ $getHeaderSa->supplier }} - {{ $getHeaderSa->nmsupp }}
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Keterangan :</label><br/>
                  {{ $getHeaderSa->keterangan }}
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Kode Brg</label>
                  <input type="text" data-toggle="modal" data-target="#modInv" class="form-control" id="kd_brg" name="kd_brg" placeholder="Klik here.." readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" id="ukuran" name="ukuran" readonly>           
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>
                  <input type="text" class="form-control" id="part_numb" name="part_numb" readonly>
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
                  <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" step="0.01">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Total</label>
                  <input type="number" class="form-control" id="total" name="total" readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
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
        <table id="trDetailPindahGudang" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Ukuran/PartNo</th>  
            <th>Nama Brg</th>          
            <th>Jumlah</th>            
            <th>Satuan</th>
            <th>Total</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailSa as $gds)
            <tr>              
                <td>{{ $gds->kdbrg }}</td>
                <td>{{ $gds->ukuran }}</td>
                <td>{{ $gds->part_numb }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ number_format($gds->harga_satuan,2,",",".") }}</td>
                <td>{{ number_format($gds->total,2,",",".") }}</td>
                <td>{{ $gds->keterangan }}</td>
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
          <tfoot>
            <tr>
                <th colspan="3">Total :</th>
                <th id="totalJumlah"></th>
                <th id="totalSatuan"></th>
                <th id="totalTotal"></th>
                <th colspan="2"></th> <!-- Colspan to match the number of columns -->
            </tr>
          </tfoot>
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
                        <table id="stInvSa" class="table table-bordered table-striped responsive">
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
                <form action="{{ route('trDetailPindahGudang.del') }}" method="post">
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

// $('#kd_brgx').change(function(){
//   // alert($(this).children('option:selected').data('id'));
//   var uk = $(this).find(':selected').attr('data-uk');
//   var pn = $(this).find(':selected').attr('data-pn');
//   var uom = $(this).find(':selected').attr('data-uom');
//   $('#part_numb').val(pn);
//   $('#ukuran').val(uk);
//   $('#uom').val(uom);
// });

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$("#trDetailPindahGudang").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailPindahGudang_wrapper .col-md-6:eq(0)');

// Start Calculate and display total sum ---------------------------
var table = $('#trDetailPindahGudang').DataTable();
var total = table.column(3).data().reduce(function (acc, val) {
    return acc + parseFloat(val);
}, 0);
$('#totalJumlah').text(total);

var totalSatuan = table.column(4).data().reduce(function (acc, val) {
    // Remove thousand separators and replace comma with dot, then parse as float
    var number = parseFloat(val.replace(/\./g, '').replace(',', '.'));
    return acc + number;
}, 0);
$('#totalSatuan').text(formatNumber(totalSatuan));

var totalTotal = table.column(5).data().reduce(function (acc, val) {
    // Remove thousand separators and replace comma with dot, then parse as float
    var number = parseFloat(val.replace(/\./g, '').replace(',', '.'));
    return acc + number;
}, 0);
$('#totalTotal').text(formatNumber(totalTotal));

// Function to format number with commas and periods
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Stop Calculate and display total sum -----------------------------

$(function () {
  $("#qty , #harga_satuan").keyup(function () {
    var qty = parseInt($("#qty").val() || 0);
    var h_s = parseFloat($("#harga_satuan").val() || 0);
    var total = parseFloat(qty * h_s);
    
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

$(document).on('click', '.editDetSa', function() {
    let id = $(this).attr('data-id');

    $.ajax({
        type: 'GET',
        url: "{{ URL::to('trDetailPindahGudang/showedit')}}"+"/"+id
    }).done( function( response ) {
        $('#editForm').html(response.html);
    });
});

$(document).on('click', '.delDetSa', function() {
    let id = $(this).attr('data-id');
    let dakod = $(this).attr('data-kode');
    $('#id-destroy').val(id);
    $('#dakod').html(dakod);
});

/* Tanpa Rupiah */
// var tanpa_rupiah = document.getElementById('harga_satuan');
// tanpa_rupiah.addEventListener('keyup', function(e)
// {
//   tanpa_rupiah.value = formatRupiah(this.value);
// });

/* Dengan Rupiah */
// var dengan_rupiah = document.getElementById('dengan-rupiah');
// dengan_rupiah.addEventListener('keyup', function(e)
// {
//   dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
// });

/* Fungsi */
// function formatRupiah(angka, prefix)
// {
//   var number_string = angka.replace(/[^,\d]/g, '').toString(),
//     split = number_string.split(','),
//     sisa  = split[0].length % 3,
//     rupiah  = split[0].substr(0, sisa),
//     ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
    
//   if (ribuan) {
//     separator = sisa ? '.' : '';
//     rupiah += separator + ribuan.join('.');
//   }
  
//   rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
//   return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
// }

$('#stInvSa').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvSa.data') !!}', // memanggil route yang menampilkan data json
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
</script> 
@stop