<?php

namespace App\Http\Controllers\back;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class categoryController extends Controller
{

    public function navcateindex()
    {
        $navcategories = Category::where('type', 'null')->paginate(10);
        return view('back.category.navcate', compact('navcategories'));
    }

    public function maincateindex()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')
            ->whereRaw("type NOT REGEXP '^[0-9]'")
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('back.category.maincate', compact('maincategories', 'navcategories'));
    }

    public function subcateindex()
    {
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->orderBy('created_at', 'desc')->paginate(10);
        $maincategories = Category::where('type', '!=', 'null')
            ->whereRaw("type NOT REGEXP '^[0-9]'")
            ->get();
        return view('back.category.subcate', compact('maincategories', 'subcategories'));
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->type = $request->type;
        $category->save();
        return redirect()->back();
    }

    public function createnav(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect()->back();
    }

    public function createmain(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->type = $request->type;
        $category->save();
        return redirect()->back();
    }

    public function first()
    {
//        $navcategories = Category::where('type', 'null')->get();
//        $maincategories = Category::where('type', '!=', 'null')
//            ->whereRaw("type NOT REGEXP '^[0-9]'")
//            ->get();
//        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
//        $response = [
//            'navcategories' => $navcategories,
//            'maincategories' => $maincategories,
//            'subcategories' => $subcategories,
//        ];
        $categories = Category::where('type', '!=', 'null')->get();

        $response = ["categories" => $categories];
        return response()->json($response, 200);
    }

    public function getAttribute(Request $request)
    {
        $attribute = Attribute::with('attributevalue', 'categories')
            ->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('categories.id', $request->keys());
            })->get();
        $response = [
            'attributes' => $attribute,
        ];
        return response()->json($response, 200);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if ($category->type == 'null') {
            return view('back.category.navcategoryedit', compact('category'));
        }
        if ($category->type !== 'null') {
            if (is_numeric($category->type)) {
                $maincategories = Category::where('type', '!=', 'null')
                    ->whereRaw("type NOT REGEXP '^[0-9]'")
                    ->get();
                return view('back.category.subcategory', compact('category', 'maincategories'));
            }
            if (is_string($category->type)) {
                $navcategories = Category::where('type', 'null')->get();
                return view('back.category.maincategoryedit', compact('category', 'navcategories'));
            }

        }

    }

    public function navupdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->save();
        return redirect()->route('navcategory');
    }

    public function mainupdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->type = $request->type;
        $category->save();
        return redirect()->route('maincategory');
    }

    public function subupdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->type = $request->type;
        $category->save();
        return redirect()->route('subcategory');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }
}
