<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Team;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        // dd($request->search);

        // $users = User::all();

        $users = $this->model->getUsers(
            $request->search ?? ''
        );

        // $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        // $user = User::findOrFail($id);
        // $user = User::find($id);
        // return $user;

        if(!$user = User::find($id)) {
            return redirect()->route('users.index');
        }
        
        return view('users.show', compact('user', 'title'));

        // $team = Team::find($id);
        // $team->load('users');

        // return $team;
        
        // $user->load('teams');
        // $title = "Usuário ".$user->name;
        // // return $user;

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        // dd($request->all());
        
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data); 

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
