<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Models\Students;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): response
    {
        $search = $request->query('search');

        if($search){
            $dataStudents = Students::where('students.idstudents', 'like', '%'. $search.'%')
                ->orWhere('students.fullname', 'like', '%'. $search.'%')
                ->paginate(10)->onEachSide(2)->fragment('students');
        }else{
        $dataStudents = Students::paginate(10)->onEachSide(2)->fragment('students');
        }
        return response()->view('students.data', [
            "students" => $dataStudents,
            "search" => $search 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request): RedirectResponse
    {
        $validate = $request->validated();

        // validate success 
        $student = new Students;
        $student->idstudents = $request->txtId;
        $student->fullname = $request->txtFullName;
        $student->gender = $request->txtGender;
        $student->address = $request->txtAddress;
        $student->email = $request->txtEmail;
        $student->phone = $request->txtPhone;
        $student->save();

        return redirect('/students')->with('msg', 'Add New Student Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students,$idStudent):Response
    {
        $data = $students->find($idStudent);
        return response()->view('students.edit', [
            "txtId" => $idStudent,
            "txtFullName" => $data->fullname,
            "txtGender" => $data->gender,
            "txtAddress" => $data->address,
            "txtEmail" => $data->email,
            "txtPhone" => $data->phone,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students, $idStudent)
    {
        $data = $students->find($idStudent);
        $data->fullname = $request->txtFullName;
        $data->gender = $request->txtGender;
        $data->address = $request->txtAddress;
        $data->email = $request->txtEmail;
        $data->phone = $request->txtPhone;
        $data->save();

        return redirect('/students')->with('msg', 'Data dengan nama '. $data->fullname.' berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students, $idStudent): RedirectResponse
    {
        $data = $students->find($idStudent);
        $data->delete();

        return redirect('/students')->with('msg', 'Data dengan nama '.$data->fullname .' berhasil dihapus');   
    }
}
