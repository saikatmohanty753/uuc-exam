<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = 'exam-head';
        $model = Role::whereName($role);
        if ($model->count() == 0) {
            Role::create(['name' => $role, 'guard_name' => 'web']);
        }
        $role = Role::create(['name' => 'exam-head']);
        $user = User::create([
            'name' => 'UUC Examination',
            'email' => 'exam@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => $model->first()->id,
        ]);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
