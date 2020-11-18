<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PeopleController extends Controller
{
    //
    public function index()
    {
        if (request()->session()->get('user'))
        {
            $people = Person::paginate(5);
            return view('pages.people')->with([
                'persons' => $people,
                'success' => false,
                'remove' => false
            ]);
        }

        return redirect('/');
    }

    public function addperson(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $id = mt_rand(0, 127);
        // get the random id and check if it exists
        while (Person::find($id)) {
            $id = mt_rand(0, 127);
        }

        $person = new Person();
        $person->fname = strtoupper($fname);
        $person->lname = strtoupper($lname);
        $person->id = $id;
        $person->save();

        // send to serial communication
        $command = escapeshellcmd('python /home/pi/Downloads/ProjectTwo/scripts/control.py 2'.$id);
        $output = shell_exec($command);

        // Paginate result
        $people = Person::paginate(5);
        return view('pages.people')->with([
            'persons' => $people,
            'success' => true,
            'remove' => false
        ]);
    }

    public function delete(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');

        $id = Person::select('id')->where('fname', $fname)
            ->where('lname', $lname)->get();
        
        $person = Person::where('fname', $fname)
        ->where('lname', $lname)->delete();

        // send to serial communication
        $command = escapeshellcmd('sudo python /home/pi/Downloads/ProjectTwo/scripts/control.py 3'.$id[0]['id']);
        $output = shell_exec($command);
        
        // Paginate result
        $people = Person::paginate(5);
        return view('pages.people')->with([
            'persons' => $people,
            'success' => false,
            'remove' => true
        ]);
    }
}
