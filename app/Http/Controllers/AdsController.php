<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\StoreAd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,ad')->only(['edit', 'update']);
        $this->middleware('can:delete,ad')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $ads = (new Ad())->with('user');
        $queries = [];
//        $ads = $ads->filteredAndSorted($request->query());

        $allowed = Ad::$filterPrams;
        $filters = array_filter(
            $request->query(),
            function ($key) use ($allowed) {
                return in_array($key, $allowed);
            },
            ARRAY_FILTER_USE_KEY
        );

        if (count($filters) > 0) {
            $ads = $ads->filter($filters);
        }

        if ($request->has('sort')) {
            $ads = $ads->orderBy('created_at', $request->get('sort'));
            $queries['sort'] = $request->get('sort');
        } else {
            $ads = $ads->orderBy('created_at', 'desc');
        }

        $ads = $ads->paginate(Ad::ADS_LIST_PAGE_SIZE)->appends($filters);
//      $ads = Ad::latest()->paginate(Ad::ADS_LIST_PAGE_SIZE);

        return view('ads.index', ['ads' => $ads, 'queries' => array_merge($filters, $queries)]);
    }

    public function show(Ad $ad)
    {
//        $ad = \Illuminate\Support\Facades\DB::table('ads')->find($id);
//        $ad = Ad::find($id);
        $comment = new Comment();

        return view('ads.show', ['ad' => $ad, 'comment' => $comment]);
    }

    public function create()
    {
        $ad = new Ad();
        $categories = Category::all()->pluck('name', 'id')->all();

        return view('ads.create', ['ad' => $ad, 'categories' => $categories, 'selected' => [],]);
    }

    public function store(StoreAd $request)
    {
        $ad = auth()->user()->publish(new Ad([
            'title' => $request->title,
            'text' => $request->text,
            'name' => $request->name,
            'phone' => $request->phone,
            'is_free' => ($request->is_free ? true : false),
            'valid_until' =>(Carbon::now()->addDays(Ad::DAYS_VALID_PERIOD))->toDateTimeString(),
        ]));

        if (is_array($request->categories) && count($request->categories)) {
            $categories = Category::whereRaw('id in (' . implode(',', $request->categories) . ')')->get();
            $ad->categories()->attach($categories);
        }

        session()->flash('message', 'Your ad was published successfully!');

        return redirect(url('/ads/' . $ad->id));
    }

    public function edit(Request $request, Ad $ad)
    {
//        if (auth()->user()->cant('update', $ad)) {
//            session()->flash('error-message', 'Unauthorized!');
//            return redirect(url('/'));
//        }

        $categories = Category::all()->pluck('name', 'id')->all();
        $selected = $ad->categories()->pluck('id')->all();

        return view('ads.edit', ['ad' => $ad, 'categories' => $categories, 'selected' => $selected,]);
    }

    public function update(StoreAd $request, Ad $ad)
    {
//        if (auth()->user()->cant('update', $ad)) {
//            session()->flash('error-message', 'Unauthorized!');
//            return redirect(url('/'));
//        }

        $ad->categories()->detach();
        $ad->fill([
            'title' => $request->title,
            'text' => $request->text,
            'name' => $request->name,
            'phone' => $request->phone,
            'is_free' => ($request->is_free ? true : false),
        ]);
        $ad->save();

        if (is_array($request->categories) && count($request->categories)) {
            $categories = Category::whereRaw('id in (' . implode(',', $request->categories) . ')')->get();
            $ad->categories()->attach($categories);
        }

        return redirect(url('/ads/' . $ad->id));
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect(url('/'));
    }
}
