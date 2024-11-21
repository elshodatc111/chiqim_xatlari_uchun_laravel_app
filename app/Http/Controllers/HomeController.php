<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\XatType;
use App\Models\Xatlar;
use App\Models\Bolim;
use App\Models\Tashkilot;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }

    public function hodimlar(){
        $Bolim = Bolim::get();
        $User = User::where('email','!=',auth()->user()->email)->get();
        return view('hodimlar',compact('User','Bolim'));
    }
    public function hodim_create(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'type' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'bolim' => $request->bolim,
            'type' => $request->type,
            'password' => Hash::make('12345678'),
        ]);
        return redirect()->back()->with('status', "Yangi foydalanuvchi qo'shildi. Parol: 12345678");
    }
    public function hodim_del($id){
        $User = User::find($id);
        $User->delete();
        return redirect()->back()->with('status', "Tanlangan hodim o'chirildi");
    }

    public function settings(){
            $XatType = XatType::get();
            $Bolim = Bolim::get();
            $Tashkilot = Tashkilot::get();
        return view('settings',compact('XatType','Bolim','Tashkilot'));
    }
    public function settings_create(Request $request){
        $validate = $request->validate([
            'type' => 'required',
            'name' => 'required',
        ]);
        if($request->type == 'XatType'){
            XatType::create([
                'type' => $request->name,
            ]);
            return redirect()->back()->with('status', "Yangi xat turi qo'shildi");
        }
        if($request->type == 'Bolim'){
            Bolim::create([
                'bolim' => $request->name,
            ]);
            return redirect()->back()->with('status', "Yangi bo'lim qo'shildi");
        }
        if($request->type == 'Tashkilot'){
            Tashkilot::create([
                'tashkilot' => $request->name,
            ]);
            return redirect()->back()->with('status', "Yangi tashkilot qo'shildi");
        }
    }
    public function settings_del(Request $request, $id){
        $validate = $request->validate([
            'type' => 'required',
        ]);
        if($request->type == 'XatType'){
            $XatType = XatType::find($id);
            $XatType->delete();
            return redirect()->back()->with('status', "Xat turi o'chirildi");
        }
        if($request->type == 'Bolim'){
            $XatType = Bolim::find($id);
            $XatType->delete();
            return redirect()->back()->with('status', "Bo'lim o'chirildi");
        }
        if($request->type == 'Tashkilot'){
            $XatType = Tashkilot::find($id);
            $XatType->delete();
            return redirect()->back()->with('status', "Tashkilot o'chirildi");
        }
    }

    public function chiqim(){
        $XatType = XatType::get();
        $Tashkilot = Tashkilot::get();
        return view('chiqim',compact('XatType','Tashkilot'));
    }

    public function chiqim_create(Request $request){
        $validate = $request->validate([
            'type' => 'required',
            'where' => 'required',
            'nushalar' => 'required',
            'page' => 'required',
        ]);
        $Xatlar = Xatlar::create([
            'type' => $request->type,
            'where' => $request->where,
            'nushalar' => $request->nushalar,
            'page' => $request->page,
            'section' => auth()->user()->bolim,
            'fio' => auth()->user()->name,
        ]);
        $id = $Xatlar->id;
        return redirect()->route('chiqim_show',$id);
    }
    public function chiqim_show($id){
        $Xatlar = Xatlar::find($id);
        return view('chiqim_show',compact('Xatlar'));
    }

    public function my_message(){
        $Xatlar = Xatlar::orderBy('created_at', 'desc')->where('fio',auth()->user()->name)->get();
        return view('my_message',compact('Xatlar'));
    }
    public function bolim_message(){
        $Xatlar = Xatlar::orderBy('created_at', 'desc')->where('section',auth()->user()->bolim)->get();
        return view('bolim_message',compact('Xatlar'));
    }
    public function all_message(){
        $Xatlar = Xatlar::orderBy('created_at', 'desc')->get();
        return view('all_message',compact('Xatlar'));
    }

}
