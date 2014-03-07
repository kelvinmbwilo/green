 <ul class="list-group">
    <?php $i=0; ?>
    @if($app->application()->get()->count() == 0)
    <li class="list-group-item" style="line-height: 25px">
        <h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
      <h4>There are no application for this applicant</h4>
    </li>
    @endif
    @foreach($app->application()->get() as $applicat)
    <li class="list-group-item" style="line-height: 25px">
        <div class="row" style="padding: 5px;">
            Application #{{++$i }}
            <span class="pull-right"><b>{{ date("j M, Y",strtotime($applicat->created_at)) }}</b></span>
        </div>
        @include("application.info")

       <a href="{{url("applicant/application/{$applicat->id}")}}" class="btn btn-xs"><i class="fa fa-th-large"></i> More Info</a>
       @if($applicat->granted()->count() == 0)
        <a href="{{url("applicant/edit/application/{$applicat->id}")}}" class="btn btn-xs "><i class="fa fa-pencil"></i> edit</a>
        @endif
    </li>
    @endforeach
</ul>

