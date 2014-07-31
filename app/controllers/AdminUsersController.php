<?php

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function listUsers()
    {
        $users = User::orderBy('last_name')->orderBy('first_name')->get();

        return View::make('admin.users.index')->with('users', $users);
    }

    public function createUser()
    {
        return View::make('admin.users.create');
    }

    public function storeUser()
    {
        $validator = Validator::make(Input::all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'password' => 'sometimes|required',
            'display_on_team' => 'in:0,1',
            'is_admin' => 'in:0,1',
            'photo' => 'mimes:jpeg,bmp,png'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('danger', 'There are form errors.');
        }

        $user = new User;
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->title = Input::get('title');
        $user->display_on_team = Input::get('display_on_team');
        $user->phone = Input::get('phone');
        $user->email = Input::get('email');
        $user->bio = Input::get('bio');
        $user->is_admin = Input::get('is_admin');
        $user->slug = Str::slug($user->full_name);

        if ($user->display_on_team) {
            $user->team_display_order = User::where('display_on_team', '1')->count() + 1;
        }

        if (Input::get('password')) {
            $user->password = Hash::make(Input::get('password'));
        } else {
            $user->password = '';
        }

        $user->save();

        if (Input::hasFile('photo')) {

            $user->photo_filename = uniqid($user->id);

            if (Input::file('photo')->move(storage_path() . '/app/users', $user->photo_filename)) {
                $user->save();
            }
        }

        return Redirect::to('/admin/users/' . $user->id .  '/edit')->with('success', 'New user created.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return View::make('admin.users.edit', compact('user'));
    }

    public function updateUser($id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make(Input::all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'password' => 'sometimes|required',
            'display_on_team' => 'in:0,1',
            'is_admin' => 'in:0,1',
            'photo' => 'mimes:jpeg,bmp,png'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('danger', 'There are form errors.');
        }

        if (Input::hasFile('photo')) {

            if ($user->photo_filename) {

                $path = storage_path() . '/app/users/' . $user->photo_filename;

                if (file_exists($path)) {
                    unlink($path);
                }

                $user->photo_filename = '';
            }

            $filename = uniqid($user->id);

            if (Input::file('photo')->move(storage_path() . '/app/users', $filename)) {
                $user->photo_filename = $filename;
            }
        }

        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->title = Input::get('title');
        $user->display_on_team = Input::get('display_on_team');
        $user->phone = Input::get('phone');
        $user->email = Input::get('email');
        $user->bio = Input::get('bio');
        $user->is_admin = Input::get('is_admin');
        $user->slug = Str::slug($user->full_name);

        if ($user->display_on_team and is_null($user->team_display_order)) {

            $team_count = User::where('display_on_team', '1')->count();

            $user->team_display_order = $team_count + 1;

        } else if (!$user->display_on_team and !is_null($user->team_display_order)) {

            $user->team_display_order = null;

            foreach (User::where('display_on_team', '1')->orderBy('team_display_order')->where('id', '!=', $user->id)->get() as $key => $team_member) {
                $team_member->team_display_order = $key + 1;
                $team_member->save();
            }
        }

        if (Input::get('password')) {
            $user->password = Hash::make(Input::get('password'));
        }

        $user->save();

        return Redirect::to('/admin/users/' . $user->id .  '/edit')->with('success', 'User updated.');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->photo_filename) {

            $path = storage_path() . '/app/users/' . $user->photo_filename;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $user->delete();

        foreach (User::where('display_on_team', '1')->orderBy('team_display_order')->get() as $key => $team_member) {
            $team_member->team_display_order = $key + 1;
            $team_member->save();
        }

        return Redirect::to('/admin/users')->with('success', 'User deleted.');
    }

    public function sortTeam()
    {
        $users = User::where('display_on_team', '1')->orderBy('team_display_order')->get();

        return View::make('admin.users.sort_team')->with('users', $users);
    }

    public function updateTeamOrder()
    {
        foreach (Input::get('users') as $key => $id) {
            $user = User::findOrFail($id);
            $user->team_display_order = $key + 1;
            $user->save();
        }
    }
}
