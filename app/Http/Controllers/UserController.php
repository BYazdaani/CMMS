<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
            'functions' => $functions,
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

        $roles = [
            'Admin',
            'Maintenance Technician',
            'Client',
        ];

        $departments = Department::all();

        $date = [
            'roles' => $roles,
            "departments" => $departments
        ];

        return view('users.create', $date);
    }


    public function store(UserRequest $userRequest)
    {
        abort_if(Gate::denies('user_create'), 403);

        DB::beginTransaction();

        try {

            $user = User::create($userRequest->validated());

            switch ($userRequest['role']) {

                case 'Maintenance Technician':
                    $user->maintenanceTechnician()->create([]);
                    $user->assignRole('Maintenance Technician');
                    break;

                case 'Client':
                    $user->client()->create([]);
                    $user->assignRole('Client');
                    break;

                case 'Admin' :
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
            return $e->getMessage();
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

        $roles = [
            'Admin',
            'Maintenance Technician',
            'Client',
        ];

        $logs = $user->loginHistories;

        $departments = Department::all();

        $workRequests = $user->workRequests;

        $data = [
            'user' => $user,
            'logs' => $logs,
            'roles' => $roles,
            "departments" => $departments,
            "workRequests" => $workRequests
        ];

        return view('users.show', $data);

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
     * @param UserRequest $userRequest
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(UserRequest $userRequest, User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);

        DB::beginTransaction();

        try {

            $user->removeRole($user->getRoleNames()[0]);

            switch ($userRequest['role']) {

                case 'Maintenance Technician':
                    $user->maintenanceTechnician()->create([]);
                    $user->assignRole('Maintenance Technician');
                    break;

                case 'Client':
                    $user->client()->create([]);
                    $user->assignRole('Client');
                    break;

                case 'Admin' :
                    $user->admin()->create([]);
                    $user->assignRole('Admin');
                    break;

                default:
                    DB::rollBack();
                    return redirect()->back();
                    break;
            }

            $user->updateOrFail($userRequest->validated());

        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back();

        }

        DB::commit();
        return redirect()->route("users.show", ['user' => $user]);
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

    /**
     * Restrict the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restrict(User $user)
    {
        abort_if(Gate::denies('user_restrict'), 403);

        $user->updateOrFail(["account_state" => ($user->account_state == 1) ? 0 : 1]);

        return redirect()->route("users.show", ['user' => $user]);
    }
}
