<?php

namespace App\Http\Livewire\Publishing;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Topics as topicsModel;
use App\Models\Titles as titlesModel;
use Illuminate\Support\Facades\Auth;

class Titles extends Component
{
    use WithFileUploads;
    public $title;
    public $name;
    public $topics_id;
    public $ordr;
    public $descr;
    public $keywords;
    public $topics;
    public $topic;
    public $ttitles;
    public $ttitle;
    public $ttitle_id;
    public $poster;
    public $posterurl;
    public $fileName;
    public $class;
    public function render()
    {
        return view('livewire.publishing.titles');
    }

    public function mount($localtitle)
    {
        $this->title = $localtitle;
        $this->topics = topicsModel::all();
        $this->ttitles = titlesModel::all();
    }

    public function savetitle()
    {
        $this->validate([
            'name' => 'required ',
            'topics_id' => 'required ',
            'ordr' => 'required ',
            'descr' => 'required ',
            'keywords' => 'required ',
        ]);
        $this->topic = topicsModel::where('name', $this->topics_id)->first();
        if ($this->topic) {
            titlesModel::create([
                'name' => $this->name,
                'topics_id' => $this->topic->id,
                'ordr' => $this->ordr,
                'descr' => $this->descr,
                'keywords' => $this->keywords,
                'users_id' => Auth::user()->id,
            ]);
            $this->class = "success";
            session()->flash('message', 'تمت عملية الإضافة بنجاح');
        }
        $this->class = "warning";
        session()->flash('message', 'تأكد من البيانات المدخلة لم تتم عملية الحفظ !');
        $this->ttitles = titlesModel::all();
    }

    public function addFiles($id)
    {
        return redirect('/publishing/titles/' . $id);
    }

    public function setTitle($id)
    {
        $this->ttitle = titlesModel::find($id);
        $this->topics_id = topicsModel::find($this->ttitle->topics_id)->name;
        $this->keywords = $this->ttitle->keywords;
        $this->ordr = $this->ttitle->ordr;
        $this->descr = $this->ttitle->descr;
        $this->name = $this->ttitle->name;
    }

    public function editTitle()
    {

        $this->topic = topicsModel::where('name', $this->topics_id)->first();
        if($this->topic){
        $this->ttitle->topics_id =   $this->topic->id;
        $this->ttitle->keywords =   $this->keywords;
        $this->ttitle->ordr =   $this->ordr;
        $this->ttitle->descr =   $this->descr;
        $this->ttitle->name =   $this->name;
        $this->ttitle->users_id =Auth::user()->id;
        $this->ttitle->save();
        $this->class = "success";
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->ttitle = null;
        $this->topics_id = null;
        $this->keywords = null;
        $this->ordr = null;
        $this->descr = null;
        $this->name = null;
        }
        $this->class = "warning";
        session()->flash('message', 'تأكد من البيانات المدخلة لم تتم عملية التعديل !');



        $this->ttitles = titlesModel::all();
    }

    public function deleteTitle()
    {
        foreach($this->ttitle->files as $file){
            unlink('storage/titles/'.$this->ttitle->id.'/'.$file->id.".".$file->extension);
            $file->delete();

        }
        $this->ttitle->delete();
        $this->ttitle = null;
        $this->topics_id = null;
        $this->keywords = null;
        $this->ordr = null;
        $this->descr = null;
        $this->name = null;
        $this->class = "success";
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        $this->ttitles = titlesModel::all();
    }
}
