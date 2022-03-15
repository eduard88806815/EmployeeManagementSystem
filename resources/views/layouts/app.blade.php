<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Management System</title>

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel='stylesheet'
            href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
        <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('customcss/customcss.css') }}" >
    </head>

    <body class="bg-light">

        {{-- add new employee modal start --}}
            <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="col">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
                                </div>
                                <div class="col">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="avatar">Select Image</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="phone">Contact Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="col">
                                    <label for="birthdate">Birth Date</label>
                                    <input type="text" name="birthdate" class="form-control" placeholder="mm/dd/yyyy" required>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="col">
                                    <label for="position">Position</label>
                                    <input type="tel" name="position" class="form-control" placeholder="Position" required>
                                </div>
                                <div class="col">
                                    <label for="datehired">Date Hired</label>
                                    <input type="text" name="datehired" class="form-control" placeholder="mm/dd/yyyy" required>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="homeaddress">Complete Home Address</label>
                                    <input type="text" name="homeaddress" class="form-control" placeholder="Complete Home Address" required>
                                </div>
                            </div>
                            
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- add new employee modal end --}}


        {{-- edit employee modal start --}}
        <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="emp_avatar" id="emp_avatar">
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="col img-thumbnail center" id="avatar">
                        </div>  
                        <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name" required>
                        </div>
                        <div class="col">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="avatar">Select Image</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="col">
                            <label for="phone">Contact Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="col">
                            <label for="birthdate">Birth Date</label>
                            <input type="text" name="birthdate" id="birthdate" class="form-control" placeholder="mm/dd/yyyy" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="col">
                            <label for="position">Position</label>
                            <input type="tel" name="position" id="position" class="form-control" placeholder="Position" required>
                        </div>
                        <div class="col">
                            <label for="datehired">Date Hired</label>
                            <input type="text" name="datehired" id="datehired" class="form-control" placeholder="mm/dd/yyyy" required>
                        </div>          
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="homeaddress">Complete Home Address</label>
                            <input type="text" name="homeaddress" id="homeaddress" class="form-control" placeholder="Complete Home Address" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        {{-- edit employee modal end --}}


        @include('layouts.navbar')

        @yield('content')


        <script type="text/javascript" src= "{{ asset('jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src= "{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src= "{{ asset('datatables/datatables.min.js') }}"></script>
        <script type="text/javascript" src= "{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
        


        <script>
            $(function() {

            // add new employee ajax request
            $("#add_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_employee_btn").text('Adding...');
                $.ajax({
                url: "{{ route('store') }}",
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                    Swal.fire(
                        'Added!',
                        'Employee Added Successfully!',
                        'success'
                    )
                    fetchAllEmployees();
                    }
                    $("#add_employee_btn").text('Add Employee');
                    $("#add_employee_form")[0].reset();
                    $("#addEmployeeModal").modal('hide');
                }
                });
            });

            // edit employee ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('edit') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#fname").val(response.first_name);
                        $("#mname").val(response.middle_name);
                        $("#lname").val(response.last_name);
                        $("#phone").val(response.phone);
                        $("#birthdate").val(response.birth_date);
                        $("#email").val(response.email);
                        $("#position").val(response.position);
                        $("#datehired").val(response.date_hired);
                        $("#homeaddress").val(response.home_address); 
                        $("#avatar").html(
                        `<img src="storage/images/${response.avatar}" width="100" class="img-fluid img-thumbnail">`);
                        $("#emp_id").val(response.id);
                        $("#emp_avatar").val(response.avatar);                              
                    }
                });
            });

            // update employee ajax request
            $("#edit_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_employee_btn").text('Updating...');
                $.ajax({
                url: "{{ route('update') }}",
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                    Swal.fire(
                        'Updated!',
                        'Employee Updated Successfully!',
                        'success'
                    )
                    fetchAllEmployees();
                    }
                    $("#edit_employee_btn").text('Update Employee');
                    $("#edit_employee_form")[0].reset();
                    $("#editEmployeeModal").modal('hide');
                }
                });
            });

            // delete employee ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{ route('delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        fetchAllEmployees();
                    }
                    });
                }
                })
            });

            // fetch all employees ajax request
            fetchAllEmployees();

            function fetchAllEmployees() {
                $.ajax({
                url: "{{ route('fetchAll') }}",
                method: 'get',
                success: function(response) {
                    $("#show_all_employees").html(response);
                    $("table").DataTable({
                    order: [0, 'desc']
                    });
                }
                });
            }
            });
        </script>
        
    </body>

</html>