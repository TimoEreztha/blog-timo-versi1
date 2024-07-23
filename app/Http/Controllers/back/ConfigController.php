<?php

namespace App\Http\Controllers\back;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ConfigController extends Controller
{
    public function index() {
        $configs = Config::paginate(10);
        return view('dashboard.config.index',compact('configs'));
    }
    public function edit($id) {
        $config = Config::findOrFail($id);
        return view('dashboard.config.edit',compact('config'));
    }
    public function update(Request $request,string $id) {

        $request->validate([
            'name' => 'required|string',
            'value' => 'required|string'
        ]);
        $config =  Config::findOrFail($id);
            
        $config->name = $request->name;
        $config->value = $request->value;
        
            $config->update();
            return redirect()->route('config.index')->with('success','Config Berhasil Di Update');
    }
}
