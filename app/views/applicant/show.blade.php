@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li class="active" style='text-transform: capitalize'>{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
          <h3 class='header'>Applicant Information</h3>
          <table class='table table-responsive'>
              <tr>
                  <td>
                      Name<br>
                      <b> {{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</b>
                  </td>
                  <td>
                      Age<br>
                      <b> {{ date("Y") - date("Y",strtotime($app->bitrhdate)) }}</b>
                  </td>
                  <td>
                      Gender<br>
                      <b>{{ $app->gender }}<b>
                  </td>
                  <td>
                      Marital Status<br>
                      <b>{{ $app->marital_status }}</b>
                  </td>
              </tr>
              
              <tr>
                  <td>
                      Phone <br>
                      <b> {{ $app->phone; }}</b>
                  </td>
                  <td>
                      Postal Address<br>
                      <b> {{ $app->postal_address }}</b>
                  </td>
                  <td>
                      Residense<br>
                      <b>{{ $app->residense }}<b>
                  </td>
                  <td>
                      Family Size<br>
                      <b>{{ $app->family_size }}</b>
                  </td>
              </tr>
              
          </table>
    </div>
      </div>

     <div class="panel panel-default">
      <div class="panel-body">
          <h3 class='header'>Applicant Registered Business Information  <a href="{{ url("applicant/{$app->id}/add/bussness") }}" class="btn btn-success btn-sm pull-right" title="Register another business"><i class="fa fa-plus fa-2x"></i></a></h3>
          <?php $i = 0; ?>
          <div class="panel-group" id="accordion">
            @foreach($app->business as $bus)
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $bus->id }}">
                      {{ $bus->discr }} <i class="fa fa-chevron-down pull-right"></i>
                  </a>
                </h4>
              </div>
                @if($i == 0)
              <div id="collapse{{ $bus->id }}" class="panel-collapse collapse in">
                  @else
              <div id="collapse{{ $bus->id }}" class="panel-collapse collapse">
                  @endif
                  <?php $i++ ?>
                <div class="panel-body">
                    @include("bussness.info")
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
    </div>
      </div>

<!--script to process the list of users-->
<script>
$(document).ready(function (){
    
});
</script>
@stop
