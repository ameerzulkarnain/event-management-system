<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Company;
use App\Models\EventParticipant;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('company')->get();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $events = Event::all();

        return view('user.create',['companies' => $companies, 'events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'required',
        ]);

        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'company_id'    => $request->company_id,
        ]);

        if(isset($request->event_id)) {
            foreach($request->event_id as $event_id) {
                $eventParticipant = EventParticipant::create([
                    'event_id'  => $event_id,
                    'user_id'   => $user->id
                ]);
            }
        }

        return redirect()->route('user.index')
            ->with('success','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $companies = Company::all();
        $events = Event::all();
        $user = User::find($user_id);
        $userEvents = EventParticipant::where('user_id', $user_id)->pluck('event_id');

        return view('user.edit',['user' => $user, 'companies' => $companies, 'events' => $events, 'userEvents' => $userEvents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'required',
        ]);

        $user = User::find($user_id)
            ->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'company_id'    => $request->company_id,
            ]);

        if(isset($request->event_id)) {
            foreach($request->event_id as $event_id) {
                $eventParticipant = EventParticipant::create([
                    'event_id'  => $event_id,
                    'user_id'   => $user_id
                ]);
            }
        }

        return redirect()->route('user.index')
            ->with('success','User edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = User::find($user_id);

        foreach($user->eventParticipant as $eventParticipant) {
            EventParticipant::find($eventParticipant->id)->delete();
        }

        $user->delete();

        return redirect()->route('user.index')
            ->with('success','Event removed successfully');
    }

    public function deleteUserEvent($eventParticipant_id)
    {
        EventParticipant::find($eventParticipant_id)->delete();

        return redirect()->route('user.index')
            ->with('success','Event removed successfully');
    }
}
