<table class='table table-striped table-responsive stafftale' id='stafftale' >
    <thead>
    <tr>
        <th> # </th>
        <th> date </th>
        <th> Amount </th>
        <th> Action</th>
        <th> Balance Before </th>
        <th> Balance After</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($app->savingtrans as $us)
    <tr>
        <td>{{ $i++ }}</td>
        <td >{{ $us->date }}</td>
        <td>{{ $us->amount }}</td>
        <td>{{ $us->action }}</td>
        <td>{{ $us->balance_before }}</td>
        <td>{{ $us->balance_after }}</td>

    </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $(".stafftale").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        });
    })
</script>