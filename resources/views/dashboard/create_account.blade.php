@extends('home')
@section('pages')
    <div class="create-account">
        <div class="dashboard-info">
            <h5>New account Creation</h5>
            <hr/>
        <form action="{{route('createaccount')}}" enctype="multipart/form-data" method="post" onload="setLocation()">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Company Name</label>
                <input type="text" class="form-control" name="company_name" id="exampleFormControlInput1" placeholder="doe towing ..." required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Company Phone</label>
                <input type="text" class="form-control" name="company_phone" id="exampleFormControlInput1" placeholder="+25706892..." required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitudeInput" placeholder="0.00" required>
                <p class="location">For better accuracy use your app's settings location</p>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitudeInput" placeholder="0.00" required>
                <p class="location">For better accuracy use your app's settings location</p>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Service type</label>
                <select class="form-control" id="exampleFormControlSelect1" name="service_type" required>
                    <option value="fire">Fire Emergency</option>
                    <option value="police">police Emergency</option>
                    <option value="hospital">Ambulance Emergency</option>
                    <option value="towing">Towing Emergency</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary mb-2">create account</button>
        </form>
    </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        if ("geolocation" in navigator){
            navigator.geolocation.getCurrentPosition(function(position){
                $('#latitudeInput').val(position.coords.latitude);
                console.log(position.coords.latitude);
                $('#longitudeInput').val(position.coords.longitude);
                console.log(position.coords.longitude);
            });
        }
    });
</script>