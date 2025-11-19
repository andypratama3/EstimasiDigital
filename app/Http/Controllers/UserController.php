<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        // $this->middleware('permission:view user', ['only' => ['index', 'show']]);
        // $this->middleware('permission:create user', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit user', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(10);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->validated();

        $user = $this->userRepository->create($input);

        // Assign roles if provided
        if ($request->has('roles')) {
            $user->syncRoles($request->input('roles'));
        }

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $roles = Role::pluck('name', 'id');
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('userRoles', $userRoles);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $data = $request->validated();

        if($request['password']==='' || $request['password']===null){
            $data['password'] = $user->password;
        }


        $user = $this->userRepository->update($data, $id);

        // Sync roles if provided
        if ($request->has('roles')) {
            $user->syncRoles($request->input('roles'));
        }

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
