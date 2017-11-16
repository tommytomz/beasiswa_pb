
@extends ('layouts.dashboard')
@section('page_heading','Insert Perhitungan')

@section('section')

{{-- <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul> --}}

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Tab 1</a></li>
        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Tab 2</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab1">...</div>
        <div role="tabpanel" class="tab-pane" id="tab2">...</div>
    </div>
</div>

{{-- {!! Form::open(array('url'=>'penilaian/simpan', 'class' => 'form col-lg-4', 'id' => 'formdata', 'method' => 'POST')) !!}
<div id="hasil"></div>


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
    {!! Form::text('ipk', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'IPK')) !!}
</div>


<div class="form-group">
    {!! Form::label('Penghasilan Orangtua') !!}
    {!! Form::text('penghasilan', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Penghasilan Orangtua')) !!}

</div>

<div class="form-group">
    {!! Form::label('Tanggungan Orangtua') !!}
    {!! Form::text('tanggungan', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Tanggungan Orangtua')) !!}

</div>

<div class="form-group">
    {!! Form::label('Jarak') !!}
    {!! Form::text('jarak', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Jarak')) !!}

</div>


{!! Form::submit('Simpan', array('class'=>'btn btn-primary', 'id'=>'tombol')) !!}


{!! Form::close() !!} --}}

{{-- <script>
  $(document).ready(function () {
    $( "#tombol" ).click(function() {
      alert( "Handler for .click() called." );
    });
  });


</script> --}}
{{-- <script>
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
                $("#formdata")[0].reset();
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
</script> --}}
{{-- @include('vendor.lrgt.ajax_script', ['form' => '#formsiswa', 'request'=>'App/Http/Requests/SiswaRequest','on_start'=>true]) --}}

@stop


