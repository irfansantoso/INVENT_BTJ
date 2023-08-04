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
        <h3 class="card-title">Detail Permintaan Barang</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailPb.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_header_pb" id="id_header_pb" value="{{ $getHeaderPb->id }}">
        <input type="hidden" name="no_pb" id="no_pb" value="{{ $getHeaderPb->no_pb }}">
        <input type="hidden" name="tgl_pb" id="tgl_pb" value="{{ $getHeaderPb->tgl_pb }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderPb->kode_periode }}">

        <div class="card-body">
          <fieldset class="form-group border p-3">
            <legend class="w-auto px-2"><h6>Header</h6></legend>          
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>No Pb :</label><br/>
                    {{ $getHeaderPb->no_pb }}
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Tgl Saldo Awal :</label><br/>                
                    {{ $getHeaderPb->tgl_pb }}
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Kd Area :</label><br/>                
                    {{ $getHeaderPb->kd_area }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kd Unit :</label><br/>
                    {{ $getHeaderPb->kd_unit }}
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Status :</label><br/>                
                    <span style="color:red;">{{ $getHeaderPb->status_pb }}</span>
                </div>
              </div>            
            </div>
          </fieldset>

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
            <div class="col-sm-3">
              <div class="form-group">
                <label>Merk</label>
                  <input type="text" class="form-control" id="merk" name="merk" readonly>
              </div>
            </div>         
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Stock Akhir</label>
                  <input type="number" class="form-control" id="last_stock" name="last_stock" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Order</label>
                  <input type="number" class="form-control" id="qty" name="qty">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Satuan</label>
                  <input type="text" class="form-control" id="uom" name="uom" readonly>
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
        <table id="trDetailPb" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>              
            <th>Nama Brg</th>
            <th>Ukuran/PartNo</th>
            <th>Merk</th>
            <th>Order</th>            
            <th>Uom</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailPb as $gds)
            <tr>              
                <td>{{ $gds->kdbrg }}</td>                
                <td>{{ $gds->part_numb }}</td>
                <td>{{ $gds->ukuran }}</td>
                <td>{{ $gds->merk }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ $gds->uom }}</td>
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
                        <table id="stInvPb" class="table table-bordered table-striped responsive">
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
                <form action="{{ route('trDetailPb.del') }}" method="post">
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
    var lstock = $(this).attr('data-laststock');
    var mrk = $(this).attr('data-merk');
    var uom = $(this).attr('data-uom');
    
    $('#kd_brg').val(kdbrg);
    $('#uom').val(uom);
    $('#part_numb').val(pn);
    $('#merk').val(mrk);
    $('#last_stock').val(lstock);
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

$("#trDetailPb").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailPb_wrapper .col-md-6:eq(0)');

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
        url: "{{ URL::to('trDetailPb/showedit')}}"+"/"+id
    }).done( function( response ) {
        $('#editForm').html(response.html);
    });
});

$(document).on('click', '.delDetSa', function() {
    let id = $(this).attr('data-id');
    let dakod = $(this).attr('data-kode');
    $('#id-destroy').val(id);
    $('#dakod').html(dakod);
    alert(id);
});


$('#stInvPb').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvPb.data') !!}', // memanggil route yang menampilkan data json
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