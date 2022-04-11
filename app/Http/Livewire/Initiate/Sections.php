<?php

namespace App\Http\Livewire\Initiate;

use Livewire\Component;
use App\Models\Sectiontypes as sectiontypesModel;
use App\Models\Years as yearsModel;
use App\Models\Sections as sectionsModel;
use Illuminate\Support\Facades\Auth;

class Sections extends Component
{
    public $title;
    public $name;
    public $sections_id;
    public $years_id;
    public $sectiontypes_id;
    public $ordr;
    public $ismain;
    public $years;
    public $year;
    public $sectiontypes;
    public $sectiontype;
    public $section;
    public $sections;
    public $insertedSection;
    public $sectionName;
    public function render()
    {
        return view('livewire.initiate.sections');
    }
    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->years = yearsModel::all();
        $this->sectiontypes=sectiontypesModel::all();
        $this->sections = sectionsModel::where('sections_id',0)->get();
    }

    public function setSectionId($id){
        $this->sections_id = $id;
        $this->section = sectionsModel::find($id);
        $this->sectionName = $this->section->name;
    }

    public function setSection($id){
        $this->sections_id = $id;
        $this->section = sectionsModel::find($id);
        $this->name = $this->section->name;
        $this->years_id = $this->section->years_id;
        $this->sectiontypes_id = $this->section->sectiontypes_id;
        $this->ordr = $this->section->ordr;
        $this->ismain = $this->section->ismain;
    }

    public function saveSection(){
        $this->validate([
            'name' => 'required ',
            'years_id' => 'required ',
            'sectiontypes_id' => 'required ',
            'ordr' => 'required ',
            'ismain' => 'required ',

    ]);
       $this->sectiontype = sectiontypesModel::find($this->sectiontypes_id);
       $this->year = yearsModel::find($this->years_id);
       if($this->sectiontype && $this->year){
          $this->insertedSection= sectionsModel::create([
            'name' => $this->name,
            'years_id' => $this->years_id,
            'sectiontypes_id' => $this->sectiontypes_id,
            'ordr' => $this->ordr,
            'ismain' =>$this->ismain,
            'users_id' => Auth::user()->id,
           ]);
           if($this->sections_id != null){
                $this->insertedSection->sections_id = $this->sections_id ;
                $this->insertedSection->save();
           }
       }
       $this->sections_id = null;
       $this->section = null;
       $this->name =null;
       session()->flash('message', 'تمت عملية الإضافة بنجاح');
       $this->sections = sectionsModel::where('sections_id',0)->get();

    }

    public function editSection(){
        $this->validate([
            'name' => 'required ',
            'years_id' => 'required ',
            'sectiontypes_id' => 'required ',
            'ordr' => 'required ',
            'ismain' => 'required ',

    ]);
        $this->sectiontype = sectiontypesModel::find($this->sectiontypes_id);
        $this->year = yearsModel::find($this->years_id);
        if($this->sectiontype && $this->year){
            $this->section->name =  $this->name;
            $this->section->years_id = $this->years_id ;
            $this->section->sectiontypes_id = $this->sectiontypes_id ;
            $this->section->ordr = $this->ordr ;
            $this->section->ismain =   $this->ismain;
            $this->section->users_id = Auth::user()->id;
            $this->section->save();
        }
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->sections = sectionsModel::where('sections_id',0)->get();
    }

    public function deletSection(){
        $this->section->delete();
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        $this->sections = sectionsModel::where('sections_id',0)->get();
    }
}
