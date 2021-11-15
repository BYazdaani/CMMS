<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(): View
    {
        abort_if(Gate::denies('user_access'), 403);

        $users = User::with('roles')->get();

        $functions = [
            'Responsable maintenance',
            'Superviseur maintenance',
            'Chargé méthodes et utilités',
            'Technicien Maintenance',
            'Opérateur Machine',
            'Team Leader',
            'Superviseur production',
        ];

        $data = [
            "users" => $users,
            'functions' => $functions
        ];

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        abort_if(Gate::denies('user_create'), 403);

        $functions = [
            'Responsable maintenance',
            'Superviseur maintenance',
            'Chargé méthodes et utilités',
            'Technicien Maintenance',
            'Opérateur Machine',
            'Team Leader',
            'Superviseur production',
        ];

        $date = [
            'functions' => $functions
        ];

        return view('users.create', $date);
    }


    public function store(UserRequest $userRequest)
    {
        abort_if(Gate::denies('user_create'), 403);

        DB::beginTransaction();

        try {

            $userRequest['password']=Hash::make($userRequest['password']);

            $user = User::create($userRequest->validated());

            switch ($userRequest['function']) {
                case 'Technicien Maintenance':
                    $user->maintenanceTechnician()->create([]);
                    $user->assignRole('Maintenance Technician');
                    break;
                case 'Superviseur production':
                case 'Team Leader':
                case 'Opérateur Machine':
                    $user->client()->create([]);
                    $user->assignRole('Client');
                    break;

                case 'Responsable maintenance' :
                case 'Superviseur maintenance':
                case 'Chargé méthodes et utilités':
                    $user->admin()->create([]);
                    $user->assignRole('Admin');
                    break;

                default:
                    DB::rollBack();
                    return redirect()->back();
                    break;
            }

        } catch (\Exception  $e) {
            DB::rollBack();
            return redirect()->back();
        }

        DB::commit();

        return redirect()->route("users.show", ['user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user): View
    {
        abort_if(Gate::denies('user_show'), 403);

        $logs = $user->loginHistories;

        $date = [
            'user' => $user,
            'logs' => $logs,
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
