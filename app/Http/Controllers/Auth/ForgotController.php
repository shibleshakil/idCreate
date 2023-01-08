<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PasswordResetOpt;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;

class ForgotController extends Controller
{
    private $apiToken = "88971747561672919276096e8ba11917c37b2e12178ebb1fb5fa";

    public function forgotPasswordShow(){
        return view('auth.forgotPassword.number');
    }

    public function forgotPassword(Request $request){
        $validatedData = $request->validate([
            'mobile_number' => 'required|exists:users,mobile_number',
        ]);

        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

        //send otp to mobile via api
        
        $to = preg_replace("|[^0-9 \+\/]|", '', $request['mobile_number']);
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
            $otpStore = new PasswordResetOpt;
            $otpStore->mobile = $request['mobile_number'];
            $otpStore->otp = $code;
            $otpStore->created_at = date('Y-m-d H:i:s');
            $otpStore->save();
            Session::put('mobile_number', $request['mobile_number']);

            return redirect()->route('forgotOtpVarify')->with('success', 'Otp code is successfully sent to your mobile, you may have to wait upto 5 min to receive your code');
        }else {
            return back()->with('error', "Otp code send failed. Try again later");
        }
    }


    public function forgotOtpVarify(Request $request){
        if ($request->isMethod('post')) {
            $chkOtp = PasswordResetOpt::where('mobile', $request->mobile_number)->where('otp', $request->code)->first();
            if ($chkOtp) {
                $chkOtp->delete();
                Session::put('mobile_number', $request['mobile_number']);
                return redirect()->route('forgotChangePassword');
            }else{
                return redirect()->route('forgotOtpVarify')->with('error', 'You have entered wrong otp code, try again later.');
            }
        }
        return view('auth.forgotPassword.otp');
    }

    public function forgotChangePassword(Request $request){
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'password' => 'required|confirmed|min:4', 
            ]);
            
            $user = User::where('mobile_number', $request->mobile_number)->first();
            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();
                Session()->forget('mobile_number');
                return redirect()->route('login')->with('success', 'Password Reset Succfully!');
            }else{
                return redirect()->route('forgotPasswordShow')->with('error', 'Password Reset Link expired. Send Otp Request Again');
            }
        }
        return view('auth.forgotPassword.change_form');
    }

}
