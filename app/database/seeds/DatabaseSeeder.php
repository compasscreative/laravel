<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        User::create([
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'john@smith.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'slug' => 'john-smith'
        ]);

        $this->command->info('Default user, John Smith, created. Email: john@smith.com, Password: password.');
    }
}
