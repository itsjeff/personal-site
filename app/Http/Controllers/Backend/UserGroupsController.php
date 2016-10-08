<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Validator;

class UserGroupsController extends Controller
{
    /**
     * Module url slug
     * @var string
     */
    public $moduleUrl = '/admin/groups';

    /**
     * User group model
     * @var App\Models\UserGroup
     */
    protected $userGroup;

    /**
     * Instantiate
     * @return  void
     */
    public function __construct(UserGroup $userGroup)
    {
        $this->pushBreadcrumb('User groups', $this->moduleUrl);

        $this->setData('moduleUrl', $this->moduleUrl);

        $this->userGroup = $userGroup;
    }

    /**
     * Displays list of available user groups.
     * @return void
     */
    public function index()
    {
        $userGroups = $this->userGroup->paginate($this->paginate);

        $this->setData('userGroups', $userGroups);

        return view('backend.usergroup-manage')->with($this->data);
    }

    /**
     * Show form to create new user group.
     *
     * @return void
     */
    public function create()
    {
        $this->pushBreadcrumb('Create');

        return view('backend.usergroup-form')->with($this->data);
    }

    /**
     * Process new user group creation.
     *
     * @return void|json
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tag' => 'required',
            ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        $userGroup = $this->userGroup->create([
            'name' => $request->input('name'),
            'tag' => $request->input('tag'),
            ]);

        return redirect($this->moduleUrl.'/'.$userGroup->id.'/edit')->with([
            'status' => 'User group successfully created.',
            ]);
    }

    /**
     * Show form to create new user group.
     *
     * @return void
     */
    public function edit($id)
    {
        $this->pushBreadcrumb('Edit');

        $userGroup = $this->userGroup->where('id', $id)->first();

        $this->setData('userGroup', $userGroup);

        return view('backend.usergroup-form')->with($this->data);
    }

    /**
     * Process group update.
     *
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tag' => 'required',
            ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        $this->userGroup
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'tag' => $request->input('tag'),
                ]);

        return redirect()->back()->with([
            'status' => 'User group successfully updated.',
            ]);
    }
}
