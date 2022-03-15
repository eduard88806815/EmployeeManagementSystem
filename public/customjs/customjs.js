
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
            $("#lname").val(response.last_name);
            $("#email").val(response.email);
            $("#phone").val(response.phone);
            $("#post").val(response.post);
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
            url: "{{ route('delete') }}",
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