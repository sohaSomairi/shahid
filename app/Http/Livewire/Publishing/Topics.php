<?php

namespace App\Http\Livewire\Publishing;

use App\Http\Livewire\Initiate\Sections;
use Livewire\Component;
use App\Models\Years as yearsModel;
use App\Models\Sections as sectionsModel;
use App\Models\Topics as topicsModel;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Topics extends Component
{
    use WithFileUploads;
    public $path;
    public $title;
    public $name;
    public $sections_id;
    public $years_id;
    public $ordr;
    public $descr;
    public $keywords;
    public $years;
    public $sections;
    public $section;
    public $year;
    public $topics;
    public $topic;
    public $topic_id;
    public $poster;
    public $posterurl;
    public $fileName;
    public $class;


    public function render()
    {
        return view('livewire.publishing.topics');
    }

    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->years = yearsModel::all();
        $this->sections = sectionsModel::all();
        $this->topics = topicsModel::all();
    }

    public function saveTopic()
    {
        $this->validate([
            'name' => 'required ',
            'years_id' => 'required ',
            'sections_id' => 'required ',
            'ordr' => 'required ',
            'descr' => 'required ',
            'keywords' => 'required ',
        ]);
        $this->section = sectionsModel::where('name',$this->sections_id)->first();
        $this->year = yearsModel::find($this->years_id);
        if ($this->section && $this->year) {
            topicsModel::create([
                'name' => $this->name,
                'years_id' => $this->years_id,
                'sections_id' => $this->section->id,
                'ordr' => $this->ordr,
                'descr' => $this->descr,
                'keywords' => $this->keywords,
                'users_id' =>Auth::user()->id,
            ]);
            $this->class = "success";
            session()->flash('message', 'تمت عملية الإضافة بنجاح');

        }
        else{
            $this->class = "warning";
            session()->flash('message', 'تأكد من البيانات المدخلة لم تتم عملية الحفظ !');
        }
        $this->topics = topicsModel::all();
    }

    public function setTopic($id)
    {
        $this->topic = topicsModel::find($id);
        $this->topic_id = $id;
        $this->name = $this->topic->name;
        $this->years_id = $this->topic->years_id;
        $this->sections_id = $this->topic->section->name;
        $this->ordr = $this->topic->ordr;
        $this->keywords = $this->topic->keywords;
        $this->descr = $this->topic->descr;
        $this->posterurl = $this->topic->extension;
    }

    public function deletTopic()
    {
        unlink('storage/topics/posters/'.$this->topic->id.'/'.$this->topic->id.".".$this->topic->extension);
        $this->topic->delete();
        $this->name = null;
        $this->years_id = null;
        $this->sections_id = null;
        $this->ordr = null;
        $this->keywords = null;
        $this->descr = null;
        $this->class = "success";
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        $this->topics = topicsModel::all();
    }

    public function editTopic()
    {
        $this->validate([
            'name' => 'required ',
            'years_id' => 'required ',
            'sections_id' => 'required ',
            'ordr' => 'required ',
            'descr' => 'required ',
            'keywords' => 'required ',
        ]);
        $this->section = sectionsModel::where('name',$this->sections_id)->first();
        $this->year = yearsModel::find($this->years_id);
        if ($this->section && $this->year) {

            $this->topic->name = $this->name;
            $this->topic->years_id = $this->years_id;
            $this->topic->sections_id = $this->section->id;
            $this->topic->ordr = $this->ordr;
            $this->keywords = $this->topic->keywords;
            $this->topic->descr = $this->descr;
            $this->topic->users_id = Auth::user()->id;
            $this->topic->save();
            $this->class = "success";
            session()->flash('message', 'تمت عملية التعديل بنجاح');
        }
        else{
            $this->class = "warning";
            session()->flash('message', 'تأكد من البيانات المدخلة لم تتم عملية الحفظ !');
        }

        $this->name = null;
        $this->years_id = null;
        $this->sections_id = null;
        $this->ordr = null;
        $this->keywords = null;
        $this->descr = null;
        $this->topics = topicsModel::all();
    }

    public function closeModel(){
        $this->name = null;
        $this->years_id = null;
        $this->sections_id = null;
        $this->ordr = null;
        $this->keywords = null;
        $this->descr = null;
    }

    public function addPoster(){
        $this->validate([
            "poster"=>'required | image|max:10024',
        ]);
        $file = $this->poster;
        $savedFile =  $this->topic_id.".".$this->poster->extension();
        $this->path =  $file->storeAs('/public/topics/posters/'.$this->topic_id,$savedFile);
        $this->topic->extension = $this->poster->extension();
        $this->topic->users_id = Auth::user()->id;
        $this->topic->save();
        $this->name = null;
        $this->years_id = null;
        $this->sections_id = null;
        $this->ordr = null;
        $this->keywords = null;
        $this->descr = null;
        $this->topic=null;
        $this->class = "success";
        session()->flash('message', 'تم إضافة مرفق بنجاح');
        $this->topics = topicsModel::all();


    }


}
