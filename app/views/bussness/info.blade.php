<span class='help-block'>All figures are in Tanzania Shillings(Tsh)
    
</span>
                  <table class='table table-responsive'>
                    <tr>
                        <td>
                            Location<br>
                            <b> {{ $bus->busness_location; }}</b>
                        </td>
                        <td>
                            Starting Year<br>
                            <b> {{ date("Y",strtotime($bus->start_year)) }}</b>
                        </td>
                        <td>
                            Initial Capital<br>
                            <b>{{ $bus->initial_captal }}<b>
                        </td>
                        <td>
                            Current Capital<br>
                            <b>{{ $bus->current_captal }}</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Daily Turnover <br>
                            <b> {{ $bus->daily_turnover; }}</b>
                        </td>
                        <td>
                            Mountly Turnover<br>
                            <b>{{ $bus->monthly_turnover }}</b>
                        </td>
                        <td>
                            Business Expenses<br>
                            <b>{{ $bus->business_expense }}</b> 
                        </td>
                        <td>
                            Non Business Expenses<br>
                            <b>{{ $bus->non_business_expense }}</b> 
                        </td>
                    </tr>
              
          </table>
                    <h4>Businness Summary</h4>
                    <p>Business growth in parcentage</p>
                    <p>Business expendeture</p>
                    <p class="col-sm-offset-1">Total expendeture</p>
                    <p>Business turnover</p>
                    <p class="col-sm-offset-1">Total Turnover Weekly</p>
                    <p class="col-sm-offset-1">Total Turnover Montly</p>
                    <p class="col-sm-offset-1">Total Turnover Yearly</p>