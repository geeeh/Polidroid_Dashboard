
@extends('home')
@section('pages')
    <div class="requests">
        <div class="dashboard-info">
            <div class="requests-rows">
                <h5 class="requests-heading">All Requests</h5>
            </div>
            <table class="table table-borderless requests-table">
                <thead>
                <tr>
                    <th scope="col">select</th>
                    <th scope="col">type</th>
                    <th scope="col">distance</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <th scope="row"><input type="checkbox"></th>
                            <td>{{$request->service_type}}</td>
                            <td>{{$request->distance}}</td>
                            <td>{{$request->status}}</td>
                            @if($request->status == 'requested')
                            <td><button class="btn btn-outline-primary">Accept</button></td>
                            @elseif($request->status == 'in-progress')
                            <td><button class="btn btn-outline-success">Finish</button></td>
                            @else
                            <td>completed</td>
                            @endif
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script type="text/javascript">
    $("tr").click(function(){
        $(this).addClass("selected").siblings().removeClass("selected");
    });
</script>