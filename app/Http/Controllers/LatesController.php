<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\students;
use App\Models\rombels;
use App\Models\rayons;
use Illuminate\Http\Request;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lates = lates::all();
        $students = students::all();
        return view('keterlambatan.index', compact('lates', 'students'));

    }

    public function rekap()
    {
        //
        $lates = lates::all();
        $students = students::all();
        return view('keterlambatan.rekap', compact('lates', 'students'));
        
    }
    
    public function bukti()
    {
        $lates = lates::all();
        $students = students::all();
        return view('keterlambatan.bukti', compact('lates', 'students'));
        
    }

    public function surat()
    {
        //
        $lates = lates::all();
        $students = students::all();
        $rombels = rombels::all();
        $rayons = rayons::all();
        return view('keterlambatan.surat', compact('lates','students', 'rombels', 'rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $students = students::all();
        return view('keterlambatan.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required',
            'student_id' => 'required',
        ]);

        Lates::create([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->bukti,
            'student_id' => $request->student_id,
        ]);
        
        if($request->hasFile('bukti')){
            $request->file('bukti')->move('bukti_images/', $request->file('bukti')->getClientOriginalName());
        }
        return redirect()->back()->with('success', 'Berhasil menambahkan data keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(lates $lates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lates $lates, $id)
    {
        //
        $lates = lates::find($id);
        $students = students::all();
        
        return view('keterlambatan.edit', compact('lates', 'students'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lates $lates, $id)
    {
        //
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required',
            'student_id' => 'required',
        ]);
        
        lates::where('id', $id)->update([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->bukti,
            'student_id' => $request->student_id,
        ]);

        return redirect()->route('keterlambatan.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lates $lates, $id)
    {
        // 
        lates::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
