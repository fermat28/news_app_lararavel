<?php

namespace App\Http\Controllers;

use App\Models\baniere;
use App\Models\categorie;
use App\Models\NewsInfo;
use Illuminate\Http\Request;

class NewsInfoController extends Controller
{
    public function store(Request $request)
    {
        $news = new NewsInfo();
        $news->name = request('name');
        $news->body = request('body');
        $news->categorie_id = request('categorie_id');
        $news->active = request('active');
        if($request->file('logo')!='')
        {
        $file=$request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $fileNameWihtExtension = $file->getClientOriginalName();
        $fileNameWihtoutExtension = pathinfo($fileNameWihtExtension, PATHINFO_FILENAME);
        $fileNameToStore=$fileNameWihtoutExtension.'_'.time().'_thumb.'.$extension;
        $dir = 'assets/News/logoinfo';

        $temp_name = uniqid();
        $thumb_resize=100;
        $fich = $request->file('logo')->move($dir, $fileNameToStore);
        $news->logo = $fich;
        }
        else
        {

            $news->logo = "pas de photos";

        }
        $news->save();
        return redirect("/");
    }

    public function edit(Request $request , $id)
    {
        $news = NewsInfo::find($id);
        $news->name = request('name');
        $news->body = request('body');
        $news->categorie_id = request('categorie_id');
        if($request->file('logo')!='')
        {
        $file=$request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $fileNameWihtExtension = $file->getClientOriginalName();
        $fileNameWihtoutExtension = pathinfo($fileNameWihtExtension, PATHINFO_FILENAME);
        $fileNameToStore=$fileNameWihtoutExtension.'_'.time().'_thumb.'.$extension;
        $dir = 'News/logoinfo';

        $temp_name = uniqid();
        $thumb_resize=100;
        $fich = $request->file('logo')->move($dir, $fileNameToStore);
        $news->logo = $fileNameToStore;
        }
        else
        {

            $news->logo = "pas de photos";

        }

        $news->save();
        return redirect("/");
    }

    public function delete()
    {
        $news = NewsInfo::find(request('id'));
        $news->delete();
        return redirect("/");
    }

    public function index()
    {
        $new = NewsInfo::all();
        $category = categorie::all();
        $banner = baniere::all()->first();
        return view("index", compact('new',"category" , 'banner'));
    }

    public function activban()
    {
        $baniere = baniere::all()->first();
        $baniere->statut = null;
        $baniere->save();
        return redirect("/");
    }

    public function desactivban()
    {
        $baniere = baniere::all()->first();
        $baniere->statut = "hidden";
        $baniere->save();
        return redirect("/");
    }

    public function updatescreen($id)
    {
        $new = NewsInfo::find($id);
        $category = categorie::all();
        $newsId = $new->id;
        return view("edit", ['news' => $new, 'newsId' => $newsId , "category" => $category]);
    }

    public function updatebanner(Request $request)
    {
        $banner = baniere::all()->first();
        $banner->couleur = $request['couleur'];
        $banner->save();
        return redirect("/");
    }

    public function updatebannertext(Request $request)
    {
        $banner = baniere::all()->first();
        $banner->couleur_texte = $request['couleur_texte'];
        $banner->save();
        return redirect("/");
    }

    public function details($id)
    {
        $usernews = NewsInfo::find($id);
        return view("details" , compact('usernews'));
    }
}
