<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;
class UsersController extends Controller
{
    public function index() 
    {
        $users = User::latest()->paginate(10);

        return view('backend.users.index', compact('users'));
    }

    public function create() 
    {
        return view('backend.users.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|min:10',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        if($user){
            return redirect()->route('users')
            ->with('success','User created successfully');
        }
        return redirect()->back()->with('error','Somthings went wrong please try again !.');
    }

    public function edit(User $user) 
    {
        return view('backend.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'phone_number' => 'required|min:10',
           
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role'));
        return redirect()->route('users')->with('success','User updated successfully');
        
    }

    public function destroy(User $user) 
    {
        $user->delete();
        return redirect()->route('users')->with('success','User deleted successfully');
    }
}
