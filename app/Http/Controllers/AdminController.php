<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function add_doctor_view() {
        if(request('id')) {
            $doctor = Doctor::find(request('id'));
            if(!$doctor) {
                return redirect()->back()->with('error', 'Doctor Not Found');
            }
            return view('admin.add_doctor', compact('doctor'));
        }
        return view('admin.add_doctor');
    }

    function save_doctor(Request $req) {

        $validatedData = $req->validate([
            'id' => ['sometimes', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11'],
            'roomnum' => ['required', 'string', 'max:3'],
            'specialty' => ['required', 'string'],
            'image' => ['nullable', 'file', 'max:5000'],
        ]);

        if($req->input('id',false)) {
            $doctor = Doctor::find($validatedData['id']);
        }
        else {
            $doctor = new Doctor;
        }
        $doctor->name = $validatedData['name'];
        $doctor->phone = $validatedData['phone'];
        $doctor->roomnum = $validatedData['roomnum'];
        $doctor->specialty = $validatedData['specialty'];

        $file = $req->file('image');
        
        if($file) {
            $ext = $file->getClientOriginalExtension();
            $name = time() . ".$ext";
            $path = "public/doctorfiles";
            if(Storage::disk('local')->putFileAs($path, $file, $name)) {
                $file = $name;
            } else {
                return redirect()
                ->back()
                ->with($req->input())
                ->with('error', 'File not uploaded');
            }
        } else {
            $file = $doctor->image ?? null;
        }

        $doctor->image = $file;
        $doctor->save();

        return redirect()
            ->back()
            ->with('success', "Data Saved Successfully!");
    }

    function get_doctors() {
        $doctors = Doctor::paginate(20);

        return view('admin.doctors', compact('doctors'));
    }

    function get_appointments() {
        $appointments = Appointment::paginate(20);

        return view('admin.appointments', compact('appointments'));
    }

    function approve_appointment($id) {
        $app = Appointment::find($id);
        if(!$app) {
            return redirect()->back()->with('error', 'Appointment Not Found');
        }

        $app->status = 'approved';
        $app->save();

        return redirect()->back()->with('success', 'Appointment Approval Success');
    }

    function disapprove_appointment($id) {
        $app = Appointment::find($id);
        if(!$app) {
            return redirect()->back()->with('error', 'Appointment Not Found');
        }

        $app->status = 'disapproved';
        $app->save();

        return redirect()->back()->with('success', 'Appointment Disapproval Success');
    }

}
