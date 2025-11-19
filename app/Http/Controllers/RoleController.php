<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\AppBaseController;

class RoleController extends AppBaseController
{
    /** @var RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->paginate(10);

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Role.
     */
    public function create()
    {
        $permissions = Permission::all(); // kirim model, bukan pluck

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->only(['name', 'guard_name']);

        // 1. Create role
        $role = Role::create($input);

        // 2. Attach permissions jika ada
        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        Flash::success('Role berhasil disimpan.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role tidak ditemukan');
            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     */
    public function edit($id)
    {
        $role = Role::find($id);

        if (!$role) {
            Flash::error('Role tidak ditemukan');
            return redirect(route('roles.index'));
        }

        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified Role in storage.
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = Role::find($id);

        if (!$role) {
            Flash::error('Role tidak ditemukan');
            return redirect(route('roles.index'));
        }

        // Update name & guard_name
        $role->update($request->only(['name', 'guard_name']));

        // Sync permission jika ada
        $role->permissions()->sync($request->permissions ?? []);

        return redirect()->route('roles.index')->with('success',' Role berhasil diupdate');
    }

    /**
     * Remove the specified Role from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            Flash::error('Role tidak ditemukan');
            return redirect(route('roles.index'));
        }

        $role->delete();

        Flash::success('Role berhasil dihapus.');

        return redirect(route('roles.index'));
    }
}
