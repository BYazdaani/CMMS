<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function index(): View
    {
        abort_if(Gate::denies('user_access'), 403);

        $users = User::with('roles')->get();

        $functions= [
            'Responsable maintenance',
            'Superviseur maintenance',
            'Chargé méthodes et utilités',
            'Technicien Maintenance',
            'Opérateur Machine',
            'Team Leader',
            'Superviseur production',
        ];

        $date = [
            "users" => $users,
            'functions'=>$functions
        ];

        return view('users.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        $functions= [
            'Responsable maintenance',
            'Superviseur maintenance',
            'Chargé méthodes et utilités',
            'Technicien Maintenance',
            'Opérateur Machine',
            'Team Leader',
            'Superviseur production',
        ];

        $date = [
            'functions'=>$functions
        ];

        return view('users.create', $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user) : View
    {
        abort_if(Gate::denies('user_show'), 403);

        $logs=$user->loginHistories;

        $date=[
            'user'=>$user,
            'logs'=> $logs,
        ];

        return view('users.show', $date);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
