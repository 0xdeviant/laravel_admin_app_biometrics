<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Logs;
use App\Person;

class DashController extends Controller
{
    public function logs()
    {
        if (request()->session()->get('user'))
        {
            $logs = Logs::latest()->paginate(7);

            return view('pages.logs')->with('logs', $logs);
        }

        return redirect('/');
    }

    public function change(Request $request)
    {
        if ($request->session()->get('user')) 
        {
            if ($request->method() == 'POST') 
            {
                $session = $request->session()->get('user');
                $old_password = $request->input('oldpassword');
                $confirm_password = $request->input('confirmpassword');
                $new_password = $request->input('newpassword');
                $confirm = User::where(['username' => $session, 'password' => $old_password])->get();

                if (count($confirm) > 0 && $confirm_password === $new_password)
                {
                    $user = User::where('username', $session)
                    ->update(['password' => $new_password]);

                    return view('pages.password')->with(['success' => true, 'transaction' => true]);
                }

                return view('pages.password')->with(['success' => false, 'transaction' => true]);
            }
        
            return view('pages.password')->with(['success' => false, 'transaction' => false]);
        }
        
        return redirect('/');
    }

    // TRIGGER FUNCTIONS
    public function namesearch(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');

        $logs = Logs::where('fname', $fname)
            ->where('lname', $lname)->paginate(5);

        return view('pages.logs')->with(['logs' => $logs]);
    }

    public function datesearch(Request $request)
    {
        $date = $request->input('date');

        $logs = Logs::whereDate('created_at', $date)->paginate(5);

        return view('pages.logs')->with(['logs' => $logs]); 
    }

    public function logout()
    {
        //
        request()->session()->flush();
        return redirect('/');   
    }
}
