@extends('template')
@section('content')

    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif
    <div class="card card">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form id="formAuthentication" class="form-horizontal">
        @csrf
        <!-- Tambahkan metode spoof PUT untuk update, diatur secara dinamis dengan JS -->
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_fa" name="kode_fa" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nama Fixed Asset</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_fa" name="nama_fa" placeholder="Nama Fixed Asset">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
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

        <table id="example3" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kode </th>
            <th>Nama Fixed Asset</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($fixedAsset as $fa)
            <tr>              
                <td>{{ $fa->kode_fa }}</td>
                <td>{{ $fa->nama_fa }}</td>
                <td>
                  <!-- Add Edit button -->
                  <a href="#" data-toggle="modal" data-target="#modal-edit" data-id="{{ $fa->id_fa }}" data-kodefa="{{ $fa->kode_fa }}" data-namafa="{{ $fa->nama_fa }}" class="btn btn-dark btn-sm editFa" title="Edit">Edit</a>
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
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-edit" aria-hidden="true">
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
@stop
@section('custom-js')
<script>
  $(document).on('click', '.editFa', function() {
      let id = $(this).attr('data-id');

      $.ajax({
          type: 'GET',
          url: "{{ URL::to('fixedAsset/showedit')}}"+"/"+id
      }).done( function( response ) {
          $('#editForm').html(response.html);
      });
  });
</script>


@stop