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

    @auth
    @if(Auth::user()->level == "administrator")
    <div class="card card">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->      
      <form class="form-horizontal" action="{{ route('stInvent.add') }}" method="POST">
         @csrf        
        <div class="card-body">          
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kel Brg</label>                
                  <select class="form-control select2" name="kel_brg" id="kel_brg" style="width: 100%;">
                    <option value="000" selected="selected">-- Kel Brg --</option>
                    @foreach ($gabJnsAlatMerk as $gjam)
                      <option value="{{ $gjam->kode_jnsAlatMerk }}" data-gjam="{{ $gjam->kode_jnsAlatMerk }}-">{{ $gjam->kode_jnsAlatMerk }}</option>
                    @endforeach
                  </select>                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kd Brg</label>
                  <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>                
                  <input type="text" class="form-control" name="part_numb">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" name="ukuran">                
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>UOM</label>                
                  <input type="text" class="form-control" name="uom">                
              </div>
            </div>           
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Merk</label>                
                  <select class="form-control select2" name="merk" id="merk" style="width: 100%;">
                    <option value="" selected="selected">-- Merk --</option>
                    @foreach ($merkBrg as $mb)
                      <option value="{{ $mb->kode_merk_b }}" data-mb="{{ $mb->kode_merk_b }}-">{{ $mb->kode_merk_b }}</option>
                    @endforeach
                  </select>                 
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Status</label>                
                  <input type="text" class="form-control" name="status">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Max Qty</label>                
                  <input type="text" class="form-control" name="max_qty">                
              </div>
            </div>
          </div>
        <!-- /.card-body -->
        </div>
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div> 
        <div style="text-align: center;">
          <a href="{{ url('stInvent/printStock/sparepart') }}" style="background: royalblue;!important" class="btn btn-primary" title="Cetak">Cetak Spareparts</a>
          <a href="{{ url('stInvent/printStock/bbm') }}" style="background: green;!important" class="btn btn-primary" title="Cetak">Cetak BBM</a>
        </div>        
        
        <!-- /.card-footer -->
      </form>              
    </div>
    @endif
    @endauth
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="stInvent" class="table table-bordered table-striped responsive">
          <thead>
          <tr>
            <th>Kd_Brg</th>
            <th>Kel_Brg</th>
            <th>Stock Akhir</th>
            <th>Nama Brg</th>
            <th>Ukuran</th>
            <th>UOM</th>
            <th>Merk</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal Show -->
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
    <!-- END Modal Show -->

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('stInvent.del') }}" method="post">
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

    <!-- Modal -->
    <div class="modal fade" id="modal-openlock" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('stInvent.openlock') }}" method="post">
                  @csrf
                  <div class="modal-body">
                      Apakah Anda yakin akan membuka lock stock kode barang ini
                      <span id="opkod"></span> ?
                      <input type='hidden' name='openlock_kdbrg' id='id-openlock'>
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

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$('#stInvent').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvent.data') !!}', // memanggil route yang menampilkan data json
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
        data: 'status',
        name: 'status'
    },
    {
        data: 'action',
        name: 'action',
        orderable: false, 
        searchable: true
    }
  ],
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

$(document).on('click', '.oplockStInvent', function() {
    let id_opl = $(this).attr('data-id');
    let opkod = $(this).attr('data-kode');
    $('#id-openlock').val(opkod);
    $('#opkod').html(opkod);    
});
</script> 
@stop