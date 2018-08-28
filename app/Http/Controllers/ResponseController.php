<?php

namespace App\Http\Controllers;

use App\Account;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Nexmo\Client\Credentials\Basic;
use Nexmo\Client;

class ResponseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $result = [];
        $account = Account::where('user_id', Auth::user()->id)->get();
        if ($account->isEmpty()) {
            return Redirect::to('new_account')->with('message', 'create an account');
        }
        $arr = $account->toArray();
        $requests = Response::where('account_id', $arr[0]['id'])->get();
        if ($requests->isNotEmpty()) {
            $result = $requests;
        }

        return view('dashboard.requests', ['requests' => $result]);
    }


    /**
     * get request by responder id.
     * @param Request $request
     */
    public function get(Request $request)
    {
        $startLat = $request->input('latitude');
        $startLng = $request->input('longitude');
        $type = strtolower($request->input('type'));

        $raw = DB::raw("
        (3959 * acos( cos( radians($startLat)) *
        cos(radians(latitude)) *
        cos( radians(longitude) - radians($startLng))
        + sin(radians($startLat)) *
        sin( radians( latitude ))))");

        $account = DB::table('account')
            ->select('latitude', 'longitude', 'service_type', 'id', 'phone', $raw)
            ->where([
                ['service_type', '=' ,  $type],
                [$raw, '<', 25]
            ])
            ->orderBy($raw, 'ASC')
            ->limit(1)
            ->get();

        $this->create($request, $account);
        return response()->json($account);

    }

    /**
     * create new request.
     * @param $request
     * @param $account
     */
    public function create($request, $account)
    {

        $result = $account->toArray();
        $result = $result[0];
        $requests = new Response();
        $requests->phone = $request->input('phone');
        $requests->latitude = $request->input('latitude');
        $requests->longitude = $request->input('longitude');
        $requests->service_type = $request->input('type');

        $requests->account_id = $result->id;
        $requests->distance = end($result);
        $requests ->save();
        $this->notifyResponder($result->phone, $request->input('latitude'), $request->input('longitude'));

    }

    /**
     * Update an existing request.
     */
    public function update()
    {

    }

    /**
     * Delete an existing request.
     */
    public function delete()
    {

    }

    private function notifyResponder($number, $latitude, $longitude) {
        $message = "Emergency request Notification. Route: https://www.google.com/maps/search/?api=1&query=" . $latitude . "," . $longitude;
        $basic  = new Basic(env('NEXMO_API_KEY'), env('NEXMO_API_SECRET'));
        $client = new Client($basic);
        $message = $client->message()->send([
            'to' => $number,
            'from' => 'Polidroid services',
            'text' => $message
        ]);
    }

    private function notifyUser()
    {
        $message = "Your Request has been recieved." . $account->company_name . "will be responding to you in no time.";
        $basic  = new Basic(env('NEXMO_API_KEY'), env('NEXMO_API_SECRET'));
        $client = new Client($basic);
        $message = $client->message()->send([
            'to' => $number,
            'from' => 'Polidroid services',
            'text' => 'A text message sent using the Nexmo SMS API'
        ]);
    }
}
