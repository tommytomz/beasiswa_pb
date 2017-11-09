
@extends ('layouts.dashboard')
@section('page_heading','Insert Mahasiswa')

@section('section')

{{-- <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul> --}}

{!! Form::open(array('url'=>'mahasiswa/simpan', 'class' => 'form col-lg-4', 'id' => 'formsiswa', 'method' => 'POST')) !!}
<div id="hasil"></div>

<div class="form-group">
    {!! Form::label('NPM') !!}
    {!! Form::text('npm', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'NPM')) !!}
</div>

<div class="form-group">
    {!! Form::label('Nama') !!}
    {!! Form::text('nama', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Nama')) !!}
</div>

<div class="form-group">
  {!! Form::label('Jenis Kelamin') !!}
  {!! Form::select('jeniskelamin', 
        
        [
         '' => 'Pilih',
         'Laki-laki' => 'Laki-laki',
         'Perempuan' => 'Perempuan'
        ],
        null,
        ['class'=>'form-control']

  ) !!}
</div>

<div class="form-group">
    {!! Form::label('Alamat') !!}
    {!! Form::textarea('alamat', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Alamat')) !!}
</div>

<div class="form-group">
    {!! Form::label('No. HP') !!}
    {!! Form::text('nohp', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'No. HP')) !!}

</div>


    {!! Form::submit('Simpan', 
      array('class'=>'btn btn-primary', 'id'=>'tombol')) !!}



{!! Form::close() !!}

{{-- <script>
  $(document).ready(function () {
    $( "#tombol" ).click(function() {
      alert( "Handler for .click() called." );
    });
  });


</script> --}}
<script>
var form = $("#formsiswa");
 
    form.submit(function(e) {
		
       e.preventDefault();
        $.ajax({
            url     : form.attr('action'),
            type    : form.attr('method'),
            data    : form.serialize(),
            dataType: 'json',
            success : function ( json )
            {
              if(json.status===200){
                $("#formsiswa")[0].reset();
				alert("sukses");
                

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
        
    });
</script>
{{-- @include('vendor.lrgt.ajax_script', ['form' => '#formsiswa', 'request'=>'App/Http/Requests/SiswaRequest','on_start'=>true]) --}}

@stop


