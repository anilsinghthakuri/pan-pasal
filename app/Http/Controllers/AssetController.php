<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $asset = [];
        $assetlist = $this->show_asset_list();
        return view('asset',[
            'assetlist'=>$assetlist,
            'asset'=>$asset,
        ]);
    }

    public function add_assets(Request $request)
    {
        $request->validate([
            'itemname'=>'required',
            'quantity'=>'required'
        ]);

        $asset = new Asset;
        $asset->item_name = $request->itemname;
        $asset->quantity = $request->quantity;
        $asset->save();
        return redirect('/assets')->with('message', 'Asset Added');

    }

    public function edit_assets($id)
    {
        $asset = Asset::Find($id);
        $assetlist = $this->show_asset_list();
        return view('asset',[
            'asset'=>$asset,
            'assetlist'=>$assetlist,
        ]);
    }

    public function update_assets(Request $request)
    {
        $id = $request->id;

        $asset = Asset::Find($id);

        $asset->item_name = $request->itemname;
        $asset->quantity = $request->quantity;
        $asset->save();
        return redirect('/assets')->with('message', 'Asset Updated');
    }

    public function delete_assets($id)
    {
        Asset::where('asset_id',$id)->delete();
        return redirect('/assets')->with('message', 'Asset deleted');
    }

    private function show_asset_list(){
        $assetlist = Asset::all();
        return $assetlist;
    }
}
