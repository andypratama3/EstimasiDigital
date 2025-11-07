<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [];

        foreach (Route::getRoutes() as $route) {

            if ($route->getName() != null) {
                $text = explode('.', $route->getName());
                if (isset($text[1]) && in_array($text[1], ['index', 'create', 'edit', 'destroy', 'show', 'store', 'update'])) {
                    $routes[] = $route->getName();
                }
            }
        }

        foreach ($routes as $item) {
            if($item != 'livewire.update')
            Permission::firstOrCreate([
                'name' => $item,
                'guard_name' => 'web',
            ]);
        }

        // Sync all permissions to superadmin role
        $superadminRole = Role::where('name', 'superadmin')->first();
        if ($superadminRole) {
            $superadminRole->syncPermissions(Permission::all());
        }
    }
}
