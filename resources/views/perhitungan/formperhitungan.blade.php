
@extends ('layouts.dashboard')
@section('page_heading','Perhitungan AHP')

@section('section')

{{-- <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul> --}}
<div class="form-group">
  <table class="table table-bordered" id="data-table">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>IPK</th>
                <th>Penghasilan Orangtua</th>
                <th>Tanggungan Orangtua</th>
                <th>Jarak</th>
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
          ajax: '{!! url('perhitungan/datanilai') !!}',
          columns: [
              { data: 'NPM', name: 'NPM' },
              { data: 'Nama', name: 'Nama' },
              { data: 'IPK', name: 'IPK' },
              { data: 'Penghasilan_Orangtua', name: 'Penghasilan_Orangtua' },
              { data: 'Tanggungan_Orangtua', name: 'Tanggungan_Orangtua' },  
              { data: 'Jarak', name: 'Jarak' }
          ]
      });
  });
</script>

<br><br>
{!! Form::open(array('url'=>'perhitungan/prosesperhitungan', 'id' => 'formdata', 'method' => 'POST')) !!}

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Kriteria</a></li>
        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Sub Kriteria IPK</a></li>
        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Sub Kriteria Penghasilan Orangtua</a></li>
        <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Sub Kriteria Tanggungan Orangtua</a></li>
        <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">Sub Kriteria Jarak</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Kriteria -->
        <div role="tabpanel" class="tab-pane active" id="tab1">
          <br>
          <div class="col-sm-6">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="col-sm-2">#</th>
                  <th scope="col" class="col-sm-2">IPK</th>
                  <th scope="col" class="col-sm-2">Penghasilan Orangtua</th>
                  <th scope="col" class="col-sm-2">Tanggungan Orangtua</th>
                  <th scope="col" class="col-sm-2">Jarak</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" >IPK</th>
                  <td>1</td>
                  <td>{!! Form::text('kriteria1', '3', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('kriteria1', 'lblkriteria1')")) !!}</td>
                  <td>{!! Form::text('kriteria2', '4', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('kriteria2', 'lblkriteria2')")) !!}</td>
                  <td>{!! Form::text('kriteria3', '4', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('kriteria3', 'lblkriteria3')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Penghasilan Orangtua</th>
                  <td><label id="lblkriteria1">0.33</label> {!! Form::hidden('hkriteria1', '0.33') !!}</td>
                  <td>1</td>
                  <td>{!! Form::text('kriteria4', '3', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('kriteria4', 'lblkriteria4')")) !!}</td>
                  <td>{!! Form::text('kriteria5', '2', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('kriteria5', 'lblkriteria5')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tanggungan Orangtua</th>
                  <td><label id="lblkriteria2">0.25</label> {!! Form::hidden('hkriteria2', '0.25') !!}</td>
                  <td><label id="lblkriteria4">0.33</label> {!! Form::hidden('hkriteria4', '0.33') !!}</td>
                  <td>1</td>
                  <td>{!! Form::text('kriteria6', '2', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('kriteria6', 'lblkriteria6')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Jarak</th>
                  <td><label id="lblkriteria3">0.25</label> {!! Form::hidden('hkriteria3', '0.25') !!}</td>
                  <td><label id="lblkriteria5">0.50</label> {!! Form::hidden('hkriteria5', '0.50') !!}</td>
                  <td><label id="lblkriteria6">0.50</label> {!! Form::hidden('hkriteria6', '0.50') !!}</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- IPK -->
        <div role="tabpanel" class="tab-pane" id="tab2">
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
                  <td>{!! Form::text('ipk1', '3', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('ipk1', 'lblipk1')")) !!}</td>
                  <td>{!! Form::text('ipk2', '4', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('ipk2', 'lblipk2')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Sedang</th>
                  <td><label id="lblipk1">0.33</label> {!! Form::hidden('hipk1', '0.33') !!}</td>
                  <td>1</td>
                  <td>{!! Form::text('ipk3', '2', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('ipk3', 'lblipk3')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tinggi</th>
                  <td><label id="lblipk2">0.25</label> {!! Form::hidden('hipk2', '0.25') !!}</td>
                  <td><label id="lblipk3">0.50</label> {!! Form::hidden('hipk3', '0.50') !!}</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Penghasilan Orang Tua -->
        <div role="tabpanel" class="tab-pane" id="tab3">
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
                  <td>{!! Form::text('penghasilan1', '3', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('penghasilan1', 'lblpenghasilan1')")) !!}</td>
                  <td>{!! Form::text('penghasilan2', '4', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('penghasilan2', 'lblpenghasilan2')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Sedang</th>
                  <td><label id="lblpenghasilan1">0.33</label> {!! Form::hidden('hpenghasilan1', '0.33') !!}</td>
                  <td>1</td>
                  <td>{!! Form::text('penghasilan3', '2', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('penghasilan3', 'lblpenghasilan3')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tinggi</th>
                  <td><label id="lblpenghasilan2">0.25</label> {!! Form::hidden('hpenghasilan2', '0.25') !!}</td>
                  <td><label id="lblpenghasilan3">0.50</label> {!! Form::hidden('hpenghasilan3', '0.50') !!}</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- Tanggungan Orang Tua -->
        <div role="tabpanel" class="tab-pane" id="tab4">
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
                  <td>{!! Form::text('tanggungan1', '3', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('tanggungan1', 'lbltanggungan1')")) !!}</td>
                  <td>{!! Form::text('tanggungan2', '4', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('tanggungan2', 'lbltanggungan2')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Sedang</th>
                  <td><label id="lbltanggungan1">0.33</label> {!! Form::hidden('htanggungan1', '0.33') !!}</td>
                  <td>1</td>
                  <td>{!! Form::text('tanggungan3', '2', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('tanggungan3', 'lbltanggungan3')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tinggi</th>
                  <td><label id="lbltanggungan2">0.25</label> {!! Form::hidden('htanggungan2', '0.25') !!}</td>
                  <td><label id="lbltanggungan3">0.50</label> {!! Form::hidden('htanggungan3', '0.50') !!}</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Jarak -->
        <div role="tabpanel" class="tab-pane" id="tab5">
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
                  <td>{!! Form::text('jarak1', '3', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('jarak1', 'lbljarak1')")) !!}</td>
                  <td>{!! Form::text('jarak2', '4', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('jarak2', 'lbljarak2')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Sedang</th>
                  <td><label id="lbljarak1">0.33</label> {!! Form::hidden('hjarak1', '0.33') !!}</td>
                  <td>1</td>
                  <td>{!! Form::text('jarak3', '2', array('required', 'class'=>'form-control', 'onKeyUp'=>"bagisubkriteria('jarak3', 'lbljarak3')")) !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tinggi</th>
                  <td><label id="lbljarak2">0.25</label> {!! Form::hidden('hjarak2', '0.25') !!}</td>
                  <td><label id="lbljarak3">0.50</label> {!! Form::hidden('hjarak3', '0.50') !!}</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<br><br><br><br>
<div class="col-sm-12">
  {!! Form::submit('Hitung', array('class'=>'btn btn-primary', 'id'=>'tombol')) !!}
</div>



{!! Form::close() !!}

<script>

  function bagisubkriteria(idtextfield, idlabel){
    var nilai = $('[name='+idtextfield+']').val();
    var hasil = 0;
    hasil = parseFloat(1/nilai).toFixed(2);
    document.getElementById(idlabel).innerHTML=hasil;
  }

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
                //$("#formdata")[0].reset();
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


