@extends ('layouts.dashboard')
@section('page_heading','Daftar Penilaian')

@section('section')


<div class="form-group">
  <table class="table table-bordered" id="data-table">
        <thead>
            <tr>
                <th>ID Penilaian</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>IPK</th>
                <th>Penghasilan Orangtua</th>
                <th>Tanggungan Orangtua</th>
                <th>Jarak</th>
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
        ajax: '{!! url('penilaian/datapenilaian') !!}',
        columns: [
            { data: 'ID_Penilaian', name: 'ID_Penilaian' },
            { data: 'NPM', name: 'NPM' },
            { data: 'Nama', name: 'Nama' },
            { data: 'IPK', name: 'IPK' },
            { data: 'Penghasilan_Orangtua', name: 'Penghasilan_Orangtua' },
            { data: 'Tanggungan_Orangtua', name: 'Tanggungan_Orangtua' },  
            { data: 'Jarak', name: 'Jarak' },
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
                url     : '{{ url('/penilaian/hapus') }}' ,
                type    : 'GET',
                data    : {key:key.ID_Penilaian},
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



