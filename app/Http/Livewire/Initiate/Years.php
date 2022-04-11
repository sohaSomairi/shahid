<?php

namespace App\Http\Livewire\Initiate;

use Livewire\Component;
use App\Models\Years as yearsModel;
use Illuminate\Support\Facades\Auth;

class Years extends Component
{
    public $title;
    public $years;
    public $yearId;
    public $name;
    public $year;

    public function render()
    {
        return view('livewire.initiate.years');
    }

    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->years = yearsModel::all();
    }


    public function saveYear()
    {
        $this->validate(['name' => 'required | unique:years']);
        yearsModel::create([
            'name' => $this->name,
            // 'users_id' => Auth::user()->id,
            'users_id' => Auth::user()->id
        ]);
        session()->flash('message', 'تمت عملية الإضافة بنجاح');
        $this->years = yearsModel::all();
    }


    public function setYear($id)
    {
        $this->year =yearsModel::find($id);
        $this->name = $this->year->name;
    }

    public function editYear(){
        $this->validate(['name' => 'required']);
        $this->year->name = $this->name ;
        $this->year->users_id = Auth::user()->id;
        $this->year->save();
        $this->year = null;
        $this->name= null ;
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->years = yearsModel::all();
    }

    public function deletYear(){
       $this->year->delete();
       $this->year = null;
       $this->name = null;
       session()->flash('message', 'تمت عملية الحذف بنجاح');
       $this->years = yearsModel::all();
    }
}
