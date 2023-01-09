<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;

class AssociateIdController extends Controller
{
    private $apiToken = "88971747561672919276096e8ba11917c37b2e12178ebb1fb5fa";

    public function addAssociatedIdForm(){
        if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3) {
            return view('associateId.number_form');
        }
        abort(404);
    }

    public function sendOtp(Request $request){
        if ($request->isMethod('post')) {
            if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3) {
                $validatedData = $request->validate([
                    'id_phone_number' => 'required|exists:users,mobile_number',
                ]);

                $checkAssociate = explode(',', auth()->user()->associate_id);
                $users = User::where('is_active', 1)->select('id','mobile_number')->get();
                foreach ($checkAssociate as $key => $value) {
                    $userId = $users->where('id', $value)->first();
                    if ($userId) {
                        $msg = 'Associate Id Number '. $request->id_phone_number. ' is already added!';
                        return back()->with('error', $msg);
                    }
                }
                $digits = 4;
                $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

                //send otp to mobile via api
                
                $to = preg_replace("|[^0-9 \+\/]|", '', $request['id_phone_number']);
                //message text
                
                $message = "আপনার অটিপি কোডটি হল - $code";
                // dd($code, $to, $message, $this->apiToken);

                $url = "http://api.greenweb.com.bd/api.php";

                $data= array(
                    'to'=>"$to",

                    'message'=>"$message",

                    'token'=>"$this->apiToken"
                );

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL,$url);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                curl_setopt($ch, CURLOPT_ENCODING, '');

                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                
                $smsresult = curl_exec($ch);

                $result = mb_substr($smsresult, 0, 2);

                if ($result == 'Ok') {
                    // echo "Otp code is successfully sent to your mobile, you may have to wait upto 5 min to receive your code";
                    // save otp code on the session
                    Session::put('otp', $code);
                    Session::put('associate_number', $request['id_phone_number']);
                    
                    return redirect()->route('varifyOtp')->with('success', 'Otp code is successfully sent to your mobile, you may have to wait upto 5 min to receive your code');
                }else {
                    return back()->with('error', "Otp code send failed. Try again later");
                }
            }
            abort(404);
        }
        return view('associateId.number_form');
    }

    public function varifyOtp(Request $request){
        $sessionOtp = Session::get('otp');
        $associate_number = Session::get('associate_number');
        if ($request->isMethod('post')) {
            if (isset($_POST['code'])) {
                //check for matching
                if ($sessionOtp == $request->code) {
                    $associateInfo = User::where('mobile_number', $associate_number)->first()->id;
                    
                    if ($associateInfo) {
                        $userAssociateIDs = auth()->user()->associate_id . ',' . $associateInfo;
                        $userAssociateIDs = ltrim($userAssociateIDs, ',');
                        $userAssociateIDs = rtrim($userAssociateIDs, ',');
    
                        $user = User::find(auth()->user()->id);
                        $user->associate_id = $userAssociateIDs;
                        $user->save();
                        return redirect()->route('id')->with('success', 'Associate id added successfully!');
                        # code...
                    }
                } else {
                    // dd("not verified");
                    return redirect()->route('varifyOtp')->with('error', 'You have entered wrong otp code, try again later.');
                }
            }
        }

        return view('associateId.otp_submit');
    }

    public function associateLogin($id, $targetId){
        // dd($id, $targetId);
        $targetInfo = User::where('mobile_number', $targetId)->first();
        if ($targetInfo) {
            Session::flush();
            Auth::loginUsingId($targetInfo->id);
        }
    }
}
