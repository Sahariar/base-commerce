<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class
        ]);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        User::factory()->create([
            'name' => 'Sahariar Kabir',
            'email' => 'sahariark@gmail.com',
            'image' => 'https://gravatar.com/avatar/872453767ea164358e41858e0e3387f1?size=256',
        ])->assignRole($adminRole);

        User::factory(10)->create()->each(function ($user) use ($customerRole){
            $user->assignRole($customerRole);
            Address::factory()->create([
                'user_id' => $user->id, // Ensure each user gets exactly one address
            ]);
        });

        Category::factory(10)->create();
        $this->call([
            ProductSeeder::class
        ]);
    }
}
