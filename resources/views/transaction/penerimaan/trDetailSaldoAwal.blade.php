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
        <h3 class="card-title">Detail Saldo Awal</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailSaldoAwal.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_header_saldo_awal" id="id_header_saldo_awal" value="{{ $getHeaderSa->id }}">
        <input type="hidden" name="no_ref" id="no_ref" value="{{ $getHeaderSa->no_ref }}">
        <input type="hidden" name="tgl_sa" id="tgl_sa" value="{{ $getHeaderSa->tgl_sa }}">
        <input type="hidden" name="no_sppb" id="no_sppb" value="{{ $getHeaderSa->no_sppb }}">
        <input type="hidden" name="supplier" id="supplier" value="{{ $getHeaderSa->supplier }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderSa->kode_periode }}">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
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
            <div class="col-sm-3">
              <div class="form-group">
                <label>Supplier :</label><br/>
                  {{ $getHeaderSa->supplier }}
              </div>
            </div>          
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Kode Brg</label>
                  <select class="form-control select2" name="kd_brg" id="kd_brg" style="width: 100%;">
                    <option value="" selected="selected">-- -- --</option>
                    @foreach ($stInvent as $si)
                      <option value="{{ $si->kd_brg }}" 
                        data-id="{{$si->kd_brg}}" 
                        data-uk="{{$si->ukuran}}" 
                        data-pn="{{$si->part_numb}}"
                        data-uom="{{$si->uom}}">
                        {{ $si->kd_brg }}
                      </option>
                    @endforeach
                  </select>
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
                  <input type="number" step="any" class="form-control" id="harga_satuan" name="harga_satuan">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Total</label>
                  <input type="number" step="any" class="form-control" id="total" name="total" readonly>
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
            @foreach ($getDetailSa as $gds)
            <tr>              
                <td>{{ $gds->kdbrg }}</td>
                <td>{{ $gds->ukuran }}</td>
                <td>{{ $gds->part_numb }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ $gds->harga_satuan }}</td>
                <td>{{ $gds->total }}</td>
                <td>                
                  No Access
                </td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
                <form action="{{ route('trHeaderTpnLmDestroy.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus
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

$('#kd_brg').change(function(){
  // alert($(this).children('option:selected').data('id'));
  var uk = $(this).find(':selected').attr('data-uk');
  var pn = $(this).find(':selected').attr('data-pn');
  var uom = $(this).find(':selected').attr('data-uom');
  $('#part_numb').val(pn);
  $('#ukuran').val(uk);
  $('#uom').val(uom);
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

$(document).on('click', '.editStInvent', function() {
    let id = $(this).attr('data-id');

    $.ajax({
        type: 'GET',
        url: "{{ URL::to('stInvent/showedit')}}"+"/"+id
    }).done( function( response ) {
        $('#editForm').html(response.html);
    });
});

$(document).on('click', '.delStInvent', function() {
    let id = $(this).attr('data-id');
    let dakod = $(this).attr('data-kode');
    $('#id-destroy').val(id);
    $('#dakod').html(dakod);
});
</script> 
@stop