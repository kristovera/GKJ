<?php
  
use Illuminate\Database\Seeder;
use App\Models\User;
   
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call([
            UserWithRoleSeeder::class,
        ]);
    
    }
}