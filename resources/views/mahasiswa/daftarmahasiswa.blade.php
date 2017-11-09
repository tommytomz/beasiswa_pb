@extends ('layouts.dashboard')
@section('page_heading','Daftar Mahasiswa')

@section('section')


<div class="form-group">
  <table class="table table-bordered" id="data-table">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<script>


$(function() {
    var tabel = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! route('datamhs.data') !!}',
        columns: [
            { data: 'NPM', name: 'NPM' },
            { data: 'Nama', name: 'Nama' },
            { data: 'Jenis_Kelamin', name: 'Jenis_Kelamin' },
            { data: 'Alamat', name: 'Alamat' },
            { data: 'No_HP', name: 'No_HP' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    $('tbody').on('click', '.btn-danger', function(e){
        e.preventDefault();
        var key = tabel.row($(this).parents('tr')).data();
        
        //return false;
        var pilih = confirm("Apakah Anda ingin menghapus data ini?");
        if(pilih==1){
            $.ajax({
                url     : '{{ url('/mahasiswa/hapus') }}' ,
                type    : 'GET',
                data    : {npm:key.NPM},
                dataType: 'json',
                success : function ( json )
                {
                  if(json.status===200){
                    tabel.ajax.reload();
                    alert(json.message);
                    
                  }
                },
                error: function( json )
                {
                    if(json.status === 422) {
                        var errors = json.responseJSON;
                        $.each(json.responseJSON, function (key, value) {
                            $('.'+key+'-error').html(value);
                        });
                    } else {
                        // Error
                        // Incorrect credentials
                        // alert('Incorrect credentials. Please try again.')
                    }
                }
            });
        }
    });

});

</script>

@stop



