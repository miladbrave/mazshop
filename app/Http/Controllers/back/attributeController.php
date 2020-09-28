<?php

namespace App\Http\Controllers\back;

use App\Attribute;
use App\Attributevalue;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class attributeController extends Controller
{
    public function attributeindex()
    {
        $attributes = Attribute::paginate(10);
        $maincategories = Category::where('type', '!=', 'null')->get();
        return view('back.attribute.attributeindex', compact('maincategories', 'attributes'));
    }

    public function attributevalueindex()
    {
        $attributes = Attribute::all();
        $attributevalues = Attributevalue::with('attribute')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('back.attribute.attributevalueindex', compact('attributes', 'attributevalues'));
    }

    public function storeattribute(Request $request)
    {
        $attribute = new Attribute();
        $attribute->title = $request->title;
        $attribute->save();
        $test =$request->get('type');
        $attribute->categories()->sync($test);
        return back();
    }

    public function storeattributevalue(Request $request)
    {
        $attributevalue = new Attributevalue();
        $attributevalue->title = $request->title;
        $attributevalue->attribute_id = $request->attribute_id;
        $attributevalue->save();
        return back();
    }

    public function attributeedit($id)
    {
        $maincategories = Category::where('type', '!=', 'null')->get();
        $attributes = Attribute::where('id',$id)->first();
        $attributecategories = Attribute::find($id)->categories()->get();
        return view('back.attribute.attributeedit', compact('maincategories', 'attributes','attributecategories'));
    }

    public function attributeupdate(Request $request,$id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->title = $request->title;
        $attribute->save();
        $test = $request->get('type');
        $attribute->categories()->sync($test);
        return redirect()->route('attributeindex');
    }

    public function attributevalueedit($id)
    {
        $attributes = Attribute::all();
        $attributevalues = Attributevalue::with('attribute')->where('id',$id)->first();
        $attributevalue = Attributevalue::find($id)->attribute()->first();
        return view('back.attribute.attributevalueedit', compact('attributes', 'attributevalues','attributevalue'));
    }

    public function attributesvalueupdate(Request $request,$id)
    {
        $attributevalue = Attributevalue::findOrFail($id);
        $attributevalue->title = $request->title;
        $attributevalue->attribute_id = $request->attribute_id;
        $attributevalue->save();
        return redirect()->route('attributevalueindex');
    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return back();
    }
    public function destroyAttributeValue($id)
    {
        $attributeValue = Attributevalue::findOrFail($id);
        $attributeValue->delete();
        return back();
    }
}
