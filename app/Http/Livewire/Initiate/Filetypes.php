<?php

namespace App\Http\Livewire\Initiate;

use Livewire\Component;
use App\Models\Filetypes as filetypesModel;
use Illuminate\Support\Facades\Auth;

class Filetypes extends Component
{
    public $title;
    public $filetypes;
    public $filetypeId;
    public $name;
    public $filetype;
    public function render()
    {
        return view('livewire.initiate.filetypes');
    }

    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->filetypes = filetypesModel::all();
    }
    public function savefiletype()
    {
        $this->validate(['name' => 'required | unique:filetypes']);
        filetypesModel::create([
            'name' => $this->name,
            // 'users_id' => Auth::user()->id,
            'users_id' => Auth::user()->id
        ]);
        session()->flash('message', 'تمت عملية الإضافة بنجاح');
        $this->filetypes = filetypesModel::all();
        $this->name = null;
    }


    public function setfiletype($id)
    {
        $this->filetype =filetypesModel::find($id);
        $this->name = $this->filetype->name;
    }

    public function editfiletype(){
        $this->validate(['name' => 'unique:filetypes']);
        $this->filetype->name = $this->name ;
        $this->filetype->users_id = Auth::user()->id ;
        $this->filetype->save();
        $this->filetype = null;
        $this->name= null ;
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->filetypes = filetypesModel::all();
    }

    public function deletfiletype(){
       $this->filetype->delete();
       $this->filetype = null;
       $this->name = null;
       session()->flash('message', 'تمت عملية الحذف بنجاح');
       $this->filetypes = filetypesModel::all();
    }

}
