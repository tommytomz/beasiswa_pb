
@extends ('layouts.dashboard')
@section('page_heading','Ubah Mahasiswa')

@section('section')

{{-- <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul> --}}



{!! Form::open(array('url'=>'mahasiswa/ubah', 'class' => 'form col-lg-4', 'id' => 'formdata', 'method' => 'POST')) !!}
<div id="hasil"></div>

@foreach($data as $cdata)

{!! Form::hidden('key', $cdata->NPM) !!}

<div class="form-group">
    {!! Form::label('NPM') !!}
    {!! Form::text('npm', $cdata->NPM, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'NPM')) !!}
</div>

<div class="form-group">
    {!! Form::label('Nama') !!}
    {!! Form::text('nama', $cdata->Nama, 
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
        $cdata->Jenis_Kelamin,
        ['class'=>'form-control']

  ) !!}
</div>

<div class="form-group">
    {!! Form::label('Alamat') !!}
    {!! Form::textarea('alamat', $cdata->Alamat, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Alamat')) !!}
</div>

<div class="form-group">
    {!! Form::label('No. HP') !!}
    {!! Form::text('nohp', $cdata->No_HP, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'No. HP')) !!}

</div>

@endforeach

    {!! Form::submit('Ubah', 
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
var form = $("#formdata");
 
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
                location.href='{{ url('/mahasiswa/daftarmhs') }}';
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
        
    });
</script>
{{-- @include('vendor.lrgt.ajax_script', ['form' => '#formsiswa', 'request'=>'App/Http/Requests/SiswaRequest','on_start'=>true]) --}}

@stop


