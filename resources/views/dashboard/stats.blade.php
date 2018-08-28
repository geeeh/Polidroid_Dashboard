@extends('home')
@section('pages')
    <div class="dashboard-info">
        <div class="row">
            <div class="boards">
                <h4> Companies</h4>
                <h3>{{ $companies }}</h3>
            </div>
            <div class="boards">
                <h4> Requests </h4>
                <h3>{{ $requests }}</h3>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-12">
                    <div id="chart-div"></div>
                    @donutchart('Polidroid', 'chart-div')
            </div>
        </div>
        <hr/>
            <div class="row">
                <div class="col-sm-12">
                        <div id="pop_div"></div>
                        @linechart('Temps', 'pop_div')
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-sm-12">
                    <div id="perf_div"></div>
                    @columnchart('Finances', 'perf_div')
                </div>
            </div>

    </div>
@endsection