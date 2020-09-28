<?php

namespace App\Http\Controllers\back;

use App\Ad;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class adsController extends Controller
{
    public function index()
    {
        $adss = Ad::all();
        return view('back.ads.index',compact('adss'));
    }

    public function create()
    {
        return view('back.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = new Ad();
        $ad->link = $request->link;
        $ad->title = $request->title;
        $ad->distribute = $request->distribute;
        $ad->number = $request->type;
        $ad->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->ad_id = $ad->id;
            $photos->save();
        }
        return redirect()->route('ads.index');
    }

    public function show(Ad $ad)
    {
        //
    }

    public function edit(Ad $ad)
    {
        return view('back.ads.edit',compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $ad->link = $request->link;
        $ad->title = $request->title;
        $ad->distribute = $request->distribute;
        $ad->number = $request->type;
        $ad->save();

        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->ad_id = $ad->id;
            $photos->save();
        }
        return redirect()->route('ads.index');
    }

    public function destroy(Ad $ad)
    {
        $photos = Photo::where('ad_id', $ad->id)->get();
        if ($photos) {
            foreach ($photos as $photo) {
                unlink(getcwd() . $photo->path);
                $photo->delete();
            }
        }
        $ad->delete();
        return redirect()->route('ads.index');
    }
}
