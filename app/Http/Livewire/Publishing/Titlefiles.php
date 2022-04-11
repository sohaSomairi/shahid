<?php

namespace App\Http\Livewire\Publishing;

use Livewire\Component;
use App\Models\Filetypes as filetypesModel ;
use Livewire\WithFileUploads;
use App\Models\Files as filesModel;
use Illuminate\Support\Facades\Auth;

class Titlefiles extends Component
{
    use WithFileUploads;
    public $name;
    public $title;
    public $filetypes;
    public $filetype;
    public $titles_id;
    public $filetypes_id;
    public $uploadfile;
    public $files;
    public $file;
    public $filePath;
    public $class;
    public function render()
    {
        return view('livewire.publishing.titlefiles');
    }
    public function mount($localtitle,$localttitle){
        $this->title = $localttitle;
        $this->filetypes = filetypesModel::all();
        $this->files = filesModel::all();
    }

    public function saveUploadFile(){
        $this->validate([
            "uploadfile"=>'required',
            "filetypes_id"=>'required',
        ]);
        $this->filetype = filetypesModel::find($this->filetypes_id);
        if($this->filetype){
            $upload = $this->uploadfile;
            $fileName = $upload->getClientOriginalName();
            $fileExtension = $upload->extension();
          $this->file =  filesModel::create([
                "name" => $fileName,
                "extension" => $fileExtension,
                "titles_id" => $this->title->id,
                "filetypes_id" => $this->filetypes_id,
                "users_id" => Auth::user()->id,
            ]);
        $savedFile =   $this->file->id.".".$upload->extension();
        $path = $upload->storeAs('/public/titles/'.$this->title->id,$savedFile);
        $this->class = "success";
        session()->flash('message', 'تمت عملية الإضافة بنجاح');
        }
        $this->class = "warning";
        session()->flash('message', 'تأكد من البيانات المدخلة لم تتم عملية الحفظ !');
        $this->files = filesModel::all();
    }

    public function setFile($id){
        $this->file = filesModel::find($id);
        $this->filetypes_id = $this->file->filetypes_id;
        $this->name = filetypesModel::find($this->file->filetypes_id)->name;

    }
    public function editfiletype(){
        $this->filetype = filetypesModel::find($this->filetypes_id);
        if($this->filetype){

            $this->file->filetypes_id = $this->filetypes_id;
            $this->file->users_id = Auth::user()->id;
            $this->file->save();
            $this->class = "success";
            session()->flash('message', 'تمت عملية التعديل بنجاح');
            $this->files = filesModel::all();
        }else{
            $this->class = "warning";
            session()->flash('message', 'تأكد من البيانات المدخلة لم تتم عملية التعديل !');
        }

    }

    public function editfile(){
        unlink('storage/titles/'.$this->title->id.$this->file->id.".".$this->file->extension);
        $upload = $this->uploadfile;
        $savedFile = $this->file->id.".".$upload->extension();
        $fileName = $upload->getClientOriginalName();
        $fileExtension = $upload->extension();
        $this->file->name = $fileName;
        $this->file->extension =$fileExtension;
        $this->file->users_id = Auth::user()->id;
        $this->file->save();
        $path = $upload->storeAs('/public/titles/'.$this->title->titles_id,$savedFile);
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        $this->files = filesModel::all();
    }

    public function deleteFile(){
        unlink('storage/titles/'.$this->title->id.$this->file->id.".".$this->file->extension);
        $this->file->delete();
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        $this->files = filesModel::all();
    }
}
