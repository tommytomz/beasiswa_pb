
@extends ('layouts.dashboard')
@section('page_heading','Perhitungan AHP')

@section('section')

{{-- <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul> --}}

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">IPK</a></li>
        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Penghasilan Orangtua</a></li>
        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Tanggungan Orangtua</a></li>
        <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Jarak</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- IPK -->
        <div role="tabpanel" class="tab-pane active" id="tab1">
          <br>
          <div class="col-sm-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Rendah</th>
                  <th scope="col">Sedang</th>
                  <th scope="col">Tinggi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="col-sm-3">Rendah</th>
                  <td class="col-sm-3">1</td>
                  <td>{!! Form::text('ipk1', null, array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('ipk1', 'lblipk1')")) !!}</td>
                  <td>{!! Form::text('ipk2', null, array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('ipk2', 'lblipk2')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Sedang</th>
                  <td><label id="lblipk1"></label></td>
                  <td>1</td>
                  <td>{!! Form::text('ipk3', null, array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('ipk3', 'lblipk3')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tinggi</th>
                  <td><label id="lblipk2"></label></td>
                  <td><label id="lblipk3"></label></td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab2">...</div>
        <div role="tabpanel" class="tab-pane" id="tab3">...</div>
        <div role="tabpanel" class="tab-pane" id="tab4">...</div>
    </div>
</div>

<script>

  function bagisubkriteria(idtextfield, idlabel){
    var nilai = $('[name='+idtextfield+']').val();
    var hasil = 0;
    hasil = parseFloat(1/nilai).toFixed(2);
    document.getElementById(idlabel).innerHTML=hasil;
  }
/*var form = $("#formdata");
 
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
        
    });*/
</script>

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


