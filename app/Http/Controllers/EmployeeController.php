<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
	public function index() {
		return view('index');
	}

	public function fetchAll() {
		$emps = Employee::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-hover table-sm text-center align-middle">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Position</th>
                <th>Date Hired</th>
				<th>Contact Number</th>
				<th>Birth Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->first_name . ' ' . $emp->middle_name . ' ' . $emp->last_name . '</td>
                <td>' . $emp->position . '</td>
				<td>' . $emp->date_hired . '</td>
                <td>' . $emp->phone . '</td>
				<td>' . $emp->birth_date . '</td>
                <td>

                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi bi-search h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	public function store(Request $request) {
		$file = $request->file('avatar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$empData = ['first_name' => $request->fname,
					'middle_name' => $request->mname, 
					'last_name' => $request->lname, 
					'birth_date' => $request->birthdate,
					'home_address' => $request->homeaddress,
					'phone' => $request->phone,
					'email' => $request->email,  
					'position' => $request->position, 
					'date_hired' => $request->datehired,
					'avatar' => $fileName];

		Employee::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	public function edit(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		return response()->json($emp);
	}

	public function update(Request $request) {
		$fileName = '';
		$emp = Employee::find($request->emp_id);
		if ($request->hasFile('avatar')) {
			$file = $request->file('avatar');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emp->avatar) {
				Storage::delete('public/images/' . $emp->avatar);
			}
		} else {
			$fileName = $request->emp_avatar;
		}

		$empData = ['first_name' => $request->fname,
					'middle_name' => $request->mname, 
					'last_name' => $request->lname, 
					'birth_date' => $request->birthdate,
					'home_address' => $request->homeaddress,
					'phone' => $request->phone,
					'email' => $request->email,  
					'position' => $request->position, 
					'date_hired' => $request->datehired, 
					'avatar' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	public function delete(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		if (Storage::delete('public/images/' . $emp->avatar)) {
			Employee::destroy($id);
		}
	}
}
