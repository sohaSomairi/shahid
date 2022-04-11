<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\usergroups as usergroupsModel;
use App\Models\Roles as rolesModel;
use App\Models\Grouprole as grouprolesModel;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;

class Groups extends Component
{
    public $selectedRoles = [];
    public $title;
    public $name;
    public $roles_id;
    public $usergroups_id;
    public $users_id;
    public $usergroups;
    public $usergroup;
    public $grouprole;
    public $grouproles;
    public $roles;
    public $role;
    public $insertedGroup;
    public $insertedRoleGroup;
    public $class;

    public function render()
    {
        return view('livewire.management.groups');
    }
    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->usergroups = usergroupsModel::all();
        $this->roles = rolesModel::all();
    }

    public function setGroup($id)
    {
        $this->usergroup = usergroupsModel::find($id);
        $this->grouprole = grouprolesModel::where('usergroups_id', $id)->get();
        $this->name = $this->usergroup->name;
        $ss = grouprolesModel::where('usergroups_id', $id)->get('roles_id AS id')->toArray();
        $this->selectedRoles = array_column($ss, 'id');
    }

    public function saveGroup()
    {

        // if ($this->name != null) {

        $this->validate([
            'name' => 'required |unique:usergroups',
        ]);

        $this->insertedGroup = usergroupsModel::create([
            'name' => $this->name,
            'users_id' => Auth::user()->id,
        ]);

        $this->insertedGroup->save();
        $insertedId = $this->insertedGroup->id;
        if ($insertedId > 0) {
            $this->insertedGroup->roles()->attach($this->selectedRoles);
        }

        $this->name = null;
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->usergroups = usergroupsModel::all();
        // }
    }

    public function editGroup()
    {
        $this->validate([
            'name' => 'required |unique:usergroups',
        ]);
        $this->usergroup->name = $this->name;
        $this->usergroup->save();
        $this->usergroup->roles()->sync($this->selectedRoles);
        $this->name = null;
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->usergroups = usergroupsModel::all();
    }

    public function deletGroup()
    {
        $this->usergroup->roles()->detach();
        $this->usergroup->delete();
        $this->name = null;
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        $this->usergroups = usergroupsModel::all();
    }
}
