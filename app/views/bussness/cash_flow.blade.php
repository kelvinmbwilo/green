<div class="btn btn-info btn-sm pull-right"><i class="fa fa-pencil-square-o"></i> Update</div>
<div class="col-sm-12">
    <h4>In Flow Parameters</h4>
    @foreach(Parameters::where("flow","in")->get() as $param)
       <label style="margin-right: 20px"><input type="checkbox" value="{{ $param->id }}" class="inflow"> {{ $param->name }}</label>
    @endforeach

    <h4>Out Flow Parameters</h4>
    @foreach(Parameters::where("flow","out")->get() as $param)
    <label style="margin-right: 20px"><input type="checkbox" value="{{ $param->id }}" class="outflow"> {{ $param->name }}</label>
    @endforeach
</div>
<table class="table table-responsive">
    <tr>
        <th></th>
        <th>Jan</th>
        <th>Feb</th>
        <th>Mar</th>
        <th>Apr</th>
        <th>May</th>
        <th>Jun</th>
        <th>Jul</th>
        <th>Aug</th>
        <th>Sep</th>
        <th>Oct</th>
        <th>Nov</th>
        <th>Dec</th>
        <th>Total</th>
    </tr>
    <tbody class="inflows">

    </tbody>
    <tr id="totalin">
        <th>Total Inflow</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tbody class="outflows">

    </tbody>
    <tr id="totalout">
        <th>Total Outflow</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>
<script>
    $(document).ready(function (){

        $(".inflow").change(function(){
            if($(this).is(":checked")){
                var element = "<tr id='"+$(this).val()+"'>";
                element += "<th>"+$(this).parent().text()+"</th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th></th>";
                element += "</tr>";
                $(".inflows").append(element);
            }else{
                $(".inflows").find("tr#"+$(this).val()).remove();
            }
        })


        $(".outflow").change(function(){
            if($(this).is(":checked")){
                var element = "<tr id='"+$(this).val()+"'>";
                element += "<th>"+$(this).parent().text()+"</th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th><input type='text' class='form-control' value='0'></th>";
                element += "<th></th>";
                element += "</tr>";
                $(".outflows").append(element);
            }else{
                $(".outflows").find("tr#"+$(this).val()).remove();
                caluculatetotal();
            }
        });

        $('#FileUploader2').on('submit', function(e) {
            e.preventDefault();
            $("#output6").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output6',
                success:  afterSuccess2
            });

        });

        function afterSuccess2(){

        }
    });

    function caluculatetotal(){
        $("#totalout th:gt(0)").each(function(){
            $(this).text("0");
        })
    }

    function isInt(value) {
        return !isNaN(value) && parseInt(value) == value;
    }
</script>