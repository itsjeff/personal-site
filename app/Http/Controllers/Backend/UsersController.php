<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Validator;

class UsersController extends Controller
{
    /**
     * Module url slug
     * @var string
     */
    public $moduleUrl = '/admin/users';

    /**
     * User model
     * @var collection
     */
    protected $user;

    /**
     * Instantiate
     */
    public function __construct(User $user)
    {
        $this->pushBreadcrumb('Users', $this->moduleUrl);
        $this->setData('moduleUrl', $this->moduleUrl);

        $this->user = $user;
    }

    /**
     * Displays users.
     * @return void
     */
    public function index()
    {
        $users = $this->user->paginate($this->paginate);

        $this->setData('users', $users);

        return view('backend.user-manage')->with($this->data);
    }

    /**
     * Show form to create a user.
     * @return void
     */
    public function create()
    {
        $this->pushBreadcrumb('Create user', '/create');

        return view('backend.user-form')->with($this->data);
    }

    /**
     * Store new user.
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect($this->moduleUrl.'/'.$user->id.'/edit');
    }

    /**
     * Show form to edit a user.
     * @return void
     */
    public function edit($id)
    {
        $this->pushBreadcrumb('Edit user', '/create');

        $this->setData('user', $this->user->find($id));

        return view('backend.user-form')->with($this->data);
    }

    /**
     * Process update and redirect to user profile.
     * @param  integer  $id  User id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json($validator->errors());
            }

            return redirect()->back();
        }

        $statusMessage = 'Profile successfully updated.';

        $user = [];

        $user['name'] = $request->input('name');

        $user['email'] = $request->input('email');

        if ($request->file('display_picture')) {
            $this->uploadDisplayPicture($request);
        }

        if ($request->has('password') && $request->has('password_confirmation')) {
            $user['password'] = bcrypt($request->input('password'));

            $statusMessage = 'Profile and password successfully updated.';
        }

        $this->user->where('id', $id)->update($user);
        
        if ($request->ajax()) {
            return response()->json([
                $statusMessage
                ]);
        }
        
        return redirect()->back()->with([
            'status' => $statusMessage
            ]);
    }

    /**
     * Upload image and return details.
     * 
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    protected function uploadDisplayPicture($request)
    {
        //
    }
}
