@extends('home')
@section('pages')
<div class="dashboard-info account">
    <div class="account-name">
        <h4>Account Information</h4>
    </div>
    <ul>
        <div class="acc-details">
            <h4> Company Details</h4>
            <button class="btn btn-outline-primary edit-details" data-toggle="modal" data-target="#exampleModalCenter">Edit company Details</button>
            <ul>
                <li>
                    <span>Company Name: </span><span> {{ $account[0]['company_name'] }}</span>
                </li>
                <li>
                        <span>Company Services: </span><span> {{ $account[0]['service_type'] }}</span>
                </li>
                <li>
                        <span>Company Phone: </span> <span> {{ $account[0]['phone'] }}</span>
                </li>
            </ul>
        </div>
        <hr/>
        <div>
            <h4>Location Details</h4>
            <li>
                <span>Latitude: </span> <span>{{ $account[0]['latitude'] }}</span>
            </li>
            <li>
                <span>Longitude: </span>  <span>{{ $account[0]['longitude'] }}</span>
            </li>
        </div>
        <hr/>
        <div>
            <p> Deactivating this account will make users unable to reach you via the polidroid application. Your account will still be part of the system and you can activate this account anytime you wish</p>
            <button class="btn btn-warning">Deactivate Account</button>
            <hr/>
            <p> Deleting this account removes your account from our system. However, data gathered while the account was active will be left in our systems. Caution! Your account will no longer be available once you take this action.</p>
                <button class="btn btn-outline-danger">Delete company Details</button>
        </div>
    </ul>
</div>
      @if($account)
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
                    <div class="create-account">
                            <div class="dashboard-info">
                                <h5>New account Creation</h5>
                                <hr/>
                            <form action="{{route('editaccount')}}" enctype="multipart/form-data" method="put" onload="setLocation()">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" value="{{ $account[0]['company_name'] }}" id="exampleFormControlInput1" placeholder="doe towing ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Company Phone</label>
                                    <input type="text" class="form-control" name="company_phone" value="{{ $account[0]['phone'] }}" id="exampleFormControlInput1" placeholder="+25706892..." required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"  value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" id="latitudeInput" value="{{ $account[0]['latitude'] }}" placeholder="0.00" required>
                                    <p class="location">For better accuracy use your app's settings location</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" id="longitudeInput" value="{{ $account[0]['longitude'] }}" placeholder="0.00" required>
                                    <p class="location">For better accuracy use your app's settings location</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Service type</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="service_type" required>
                                        <option value="" selected disabled hidden>pick a type here</option>
                                        <option value="fire">Fire Emergency</option>
                                        <option value="police">police Emergency</option>
                                        <option value="hospital">Ambulance Emergency</option>
                                        <option value="towing">Towing Emergency</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary mb-2">Edit Account</button>
                            </form>
                        </div>
                        </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    @endsection

