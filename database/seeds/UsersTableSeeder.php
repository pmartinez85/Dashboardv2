<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 25)->create()->each(function ($u) {
            $u->threads()->save(factory(App\Thread::class)->make());

            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());
        });

        factory(App\User::class, 25)->create()->each(function ($u) {
            $u->threads()->save(factory(App\Thread::class)->make());
            $u->threads()->save(factory(App\Thread::class)->make());

            $u->tasks()->save(factory(App\Task::class)->make());
        });

        factory(App\User::class, 25)->create()->each(function ($u) {
            $u->threads()->save(factory(App\Thread::class)->make());
            $u->threads()->save(factory(App\Thread::class)->make());
            $u->threads()->save(factory(App\Thread::class)->make());

            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());
        });

        factory(App\User::class, 25)->create()->each(function ($u) {
            $u->threads()->save(factory(App\Thread::class)->make());
            $u->threads()->save(factory(App\Thread::class)->make());
            $u->threads()->save(factory(App\Thread::class)->make());
            $u->threads()->save(factory(App\Thread::class)->make());

            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());

        });
    }
}
