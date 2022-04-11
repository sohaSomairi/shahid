<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\Sections;
use App\Models\Titles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class dashboardController extends Controller
{
    public function __construct(Request $r)
    {
        $this->middleware('auth');
        if ($r->path() == "" || $r->path() == "/" || $r->path() == "/home") {
            ;
        } else {
            $role = DB::select(DB::raw("SELECT * FROM ROLES WHERE '" . $r->path() . "' LIKE CONCAT(url ,'%')"));

            if (count($role) > 0) {
             $this->middleware("can:" . $role[0]->policy);
            }
        }

    }

    public function index(){
        return view('index',['title' => 'الرئيسية' ,'menu'=>'رئيسية']);
    }

    public function initiate(){
        return view('initiate.index',['title' => 'تهيئة','menu'=>'تهيئات']);
    }
    public function years(){
        return view('initiate.years',['title' => 'تهيئة الاعوام','menu'=>'تهيئات']);
    }
    public function sections(){
        return view('initiate.sections',['title' => 'تهيئة الاقسام','menu'=>'تهيئات']);
    }
    public function filetypes(){
        return view('initiate.filetypes',['title' => 'تهيئة انواع المرفقات','menu'=>'تهيئات']);
    }
    public function publish(){
        return view('publishing.index',['title' => 'النشر','menu'=>'نشر']);
    }
    public function topics(){
        return view('publishing.topics',['title' => 'المواضيع','menu'=>'نشر']);
    }
    public function titles(){
        return view('publishing.titles',['title' => 'عناوين','menu'=>'نشر']);
    }
    public function opentitle($id){
        $ttitle = Titles::find($id);
        return view('publishing.titlefiles',['title' => 'النشر','menu'=>'نشر','ttitle' =>$ttitle ]);
    }
    public function slider(){
        return view('publishing.slider',['title' => 'شرائح العرض','menu'=>'نشر']);
    }


    public function getSection(Request $r)
    {
        $term = $r->term;
        $sections = Sections::where("name", "like", "%" . $term . "%")->whereDoesntHave('subsections')->get();
        $t = array();
        foreach ($sections as $section) {
            $t[] = $section->name;
        }

        echo json_encode($t);
    }
    public function gettopic(Request $r)
    {
        $term = $r->term;
        $topics = topics::where("name", "like", "%" . $term . "%")->get();
        $t = array();
        foreach ($topics as $topic) {
            $t[] = $topic->name;
        }

        echo json_encode($t);
    }

    public function addPoster(Request $r,$id){
        $topic=Topics::find($id);
        dd($topic);
        $poster = $r->file('poster');
        $newname= $topic->id.'.'.$poster->extension();
        $posterExt =$poster->extension();
        $poster->move(public_path('topics/posters'.'./' . $topic->id),$newname);
        $topic->posterurl = $posterExt;
        $topic->save();
        return response()->json(['success'=>'Done']);
    }


    /**Start users Functions  */


    public function management(){
        return view('management.index',['title' => ' إدارة المستخدمين','menu'=>'إدارة الحسابات']);
    }

    public function users(){
        return view('management.users',['title' => ' إدارة المستخدمين ','menu'=>'إدارة الحسابات']);
    }

    public function usergroups(){
        return view('management.groups',['title' => ' إدارة الصلاحيات ','menu'=>'إدارة الحسابات']);
    }

    public function me(){
        $me = User::find(Auth::user()->id);
        return view('user.profile',['title' => 'الصفحة الشخصية','me'=>$me ,'menu'=>'الحساب الشخصي']);
    }
    /**End users Functions   */
    public function dropzoneStore(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $image = $request->file('file');
        $i= $user->id.'.'.$image->extension();
        $imageName =$image->extension();
        $image->move(public_path('images/profile/' . $user->id),$i);
        $update=$user->update(['img'=>$imageName]);
        return response()->json(['success'=>$imageName]);

    }
    //
}
