<?php

namespace App\Http\Livewire\Publishing;

use Livewire\Component;
use App\Models\carousel as carouselModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Slider extends Component
{
    use WithFileUploads;
    public $title;
    public $name;
    public $subtitle;
    public $link;
    public $ordr;
    public $sliders;
    public $slider;
    public $img;

    public function render()
    {
        return view('livewire.publishing.slider');
    }

    public function mount($localtitle){
        $this->title = $localtitle;
        $this->sliders = carouselModel::all();
    }

    public function saveSlider(){
        $this->validate([
            'name' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'ordr' => 'required',
            'img' => 'required',
        ]);
        $upload = $this->img;
        $slider = carouselModel::create([
            'title' =>$this->name,
            'subtitle' =>$this->subtitle,
            'link' =>$this->link,
            'ordr' =>$this->ordr,
            'users_id' => Auth::user()->id,
            'extension' =>$upload->extension(),
        ]);
        $savedFile =   $slider->id.".".$upload->extension();
        $path = $upload->storeAs('/public/carousel',$savedFile);
        session()->flash('message', 'تمت عملية الإضافة بنجاح');
        $this->sliders = carouselModel::all();
    }

    public function setSlider($id){
        $this->slider = carouselModel::find($id);
        $this->name = $this->slider->title;
        $this->subtitle = $this->slider->subtitle;
        $this->link = $this->slider->link;
        $this->ordr = $this->slider->ordr;

    }

    public function editSlider(){

        $this->slider->users_id = Auth::user()->id ;
       $this->slider->title = $this->name ;
       $this->slider->subtitle =  $this->subtitle;
       $this->slider->link =  $this->link  ;
       $this->slider->ordr =  $this->ordr  ;
       $this->slider->save();
       $this->slider = null;
       $this->name = null;
       $this->subtitle = null;
       $this->link = null;
       $this->ordr = null;
       session()->flash('message', 'تم تعديل البيانات بنجاح');

       $this->sliders = carouselModel::all();

    }

    public function changeSlideImg(){
        $upload = $this->img;
        unlink('storage/carousel/'.$this->slider->id.'.'.$this->slider->extension);
        $savedFile =   $this->slider->id.".".$upload->extension();
        $this->slider->extension = $upload->extension();
        $this->slider->save();
        $upload->storeAs('/public/carousel',$savedFile);
        session()->flash('message', 'تم تغيير الصورة بنجاح');

    }
    public function deleteSlider(){
        unlink('storage/carousel/'.$this->slider->id.'.'.$this->slider->extension);
        $this->slider->delete();
        $this->slider = null;
        $this->name = null;
        $this->subtitle = null;
        $this->link = null;
        $this->ordr = null;
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        $this->sliders = carouselModel::all();
    }
}
