<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Ad;
use Illuminate\Support\Facades\Input;

class AdsController extends Controller
{

    public function index(Request $request)
    {
        $ads = new Ad();
        $queries = [];
        $columns = [
            'is_free',
        ];

        foreach ($columns as $column) {
            if ($request->has($columns)) {
                $ads = $ads->where($column, $request->get($column));
                $queries[$column] = $request->get($column);
            }
        }

        if ($request->has('sort')) {
            $ads = $ads->orderBy('created_at', $request->get('sort'));
            $queries['sort'] = $request->get('sort');
        } else {
            $ads = $ads->orderBy('created_at', 'desc');
        }

        $ads = $ads->paginate(Ad::ADS_LIST_PAGE_SIZE)->appends($queries);
//      $ads = Ad::latest()->paginate(Ad::ADS_LIST_PAGE_SIZE);

        return view('ads.index', ['ads' => $ads,]);
    }

    public function show(Ad $ad)
    {
//        $ad = \Illuminate\Support\Facades\DB::table('ads')->find($id);
//        $ad = Ad::find($id);

        return view('ads.show', ['ad' => $ad]);
    }

    public function create()
    {
        $ad = new Ad();

        return view('ads.create', ['ad' => $ad]);
    }

    public function store(StoreAd $request)
    {
        $ad = Ad::Create([
            'title' => $request->title,
            'text' => $request->text,
            'name' => $request->name,
            'phone' => $request->phone,
            'is_free' => ($request->is_free ? true : false),
            'valid_until' =>(Carbon::now()->addDays(Ad::DAYS_VALID_PERIOD))->toDateTimeString(),
        ]);

        return redirect(url('/ads/' . $ad->id));
    }

    public function edit(Ad $ad)
    {
        return view('ads.edit', ['ad' => $ad]);
    }

    public function update(StoreAd $request, Ad $ad)
    {
        $ad->fill([
            'title' => $request->title,
            'text' => $request->text,
            'name' => $request->name,
            'phone' => $request->phone,
            'is_free' => ($request->is_free ? true : false),
        ]);
        $ad->save();

        return redirect(url('/ads/' . $ad->id));
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect(url('/'));
    }
}
