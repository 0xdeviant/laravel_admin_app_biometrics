<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index() {
        return view('pages.enter');
    }

    public function activate_enter() {
        // send to serial communication
        $command = escapeshellcmd('python /home/pi/Downloads/ProjectTwo/scripts/control.py 1');
        $output = shell_exec($command);

        return redirect('/access');
    }

    public function activate_exit() {
        // send to serial communication
        $command = escapeshellcmd('python /home/pi/Downloads/ProjectTwo/scripts/control.py 4');
        $output = shell_exec($command);

        return redirect('/access');
    }
}
