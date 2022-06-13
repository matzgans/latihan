<?php

namespace App\Http\Controllers;
use App\Models\Pelapor;
use Illuminate\Http\Request;
use PDF;
class PelaporController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Pelapor::where('nama','LIKE', '%'.$request->search. '%')->paginate(2);
        }else{
            $data = Pelapor::paginate(2);
        }
        
        return view('pelapor', compact('data'));
    }
    public function tambah(){
        return view('tambah');
    }
    public function insertdata(Request $request){
        $data = Pelapor::create($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('tambahfoto/', $request->file('foto')->getclientoriginalname());
            $data->foto = $request->file('foto')->getclientoriginalname();
            $data->save();
        }
        return view('insertdata');
    }
    public function tampildata($id){
        $data= Pelapor::find($id);
        // dd($data);
        return view('tampildata', compact('data'));
    }
    public function editdata(Request $request, $id){
        $data=Pelapor::find($id);
        $data->update($request->all());
        return view('insertdata');
    }
    public function hapusdata(Request $request, $id){
        $data = Pelapor::find($id);
        $data->delete($request->all());
        return redirect()->route('pelapor');
    }
    public function exportpdf(){
        $data= Pelapor::all();
        view()->share('data' ,$data);
        $pdf = PDF::loadview('tampilpdf');
        return $pdf->download('data.pdf');
    }
}
