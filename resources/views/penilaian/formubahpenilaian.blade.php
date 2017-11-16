
@extends ('layouts.dashboard')
@section('page_heading','Insert Penilaian')

@section('section')

{{-- <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul> --}}



{!! Form::open(array('url'=>'penilaian/ubah', 'class' => 'form col-lg-4', 'id' => 'formdata', 'method' => 'POST')) !!}
<div id="hasil"></div>

@foreach($data as $cdata)

{!! Form::hidden('key', $cdata->ID_Penilaian) !!}


<div class="form-group">
  {!! Form::label('Mahasiswa') !!}
  {!! Form::select('mahasiswa', 
      
         $datamhs
        ,
        null,
        ['class'=>'form-control']

  ) !!}
</div>

<div class="form-group">
    {!! Form::label('IPK') !!}
    {!! Form::text('ipk', $cdata->IPK, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'IPK')) !!}
</div>


<div class="form-group">
    {!! Form::label('Penghasilan Orangtua') !!}
    {!! Form::text('penghasilan', $cdata->Penghasilan_Orangtua, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Penghasilan Orangtua')) !!}

</div>

<div class="form-group">
    {!! Form::label('Tanggungan Orangtua') !!}
    {!! Form::text('tanggungan', $cdata->Tanggungan_Orangtua, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Tanggungan Orangtua')) !!}

</div>

<div class="form-group">
    {!! Form::label('Jarak') !!}
    {!! Form::text('jarak', $cdata->Jarak, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Jarak')) !!}

</div>

@endforeach

{!! Form::submit('Ubah', array('class'=>'btn btn-primary', 'id'=>'tombol')) !!}


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
                location.href='{{ url('/penilaian/daftarpenilaian') }}';
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


