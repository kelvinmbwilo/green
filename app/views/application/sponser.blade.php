<div class="col-sm-8">
          Name:<br>
    <b>{{$spo->firstname }} {{$spo->middlename }} {{$spo->lastname}}</b>  
</div>
<div class="col-sm-4">
         Gender<br>
    <b>{{$spo->gender }}</b>
</div>
<div class="col-sm-4">
        age<br>
    <b>{{date("Y") - date("Y",strtotime($spo->birthdate)) }}</b>
</div>


<div class="col-sm-4">
        Phone<br>
    <b>{{$spo->phone }}</b>
</div>
<div class="col-sm-4">
        Residense<br>
    <b>{{$spo->residense }}</b>
</div>
<div class="col-sm-4">
    Postal Address<br>
    <b>{{$spo->postal }}</b>
</div>

<div class="row" style="border-bottom: solid #00aa00">
    
</div>