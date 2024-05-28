<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Customers</title>
    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional CSS for table styling */
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>
            registered Customers
            <!-- Add Button trigger modal -->
            <button type="button" class="btn btn-primary addbutton" data-bs-toggle="modal"
                data-bs-target="#exampleModal1">
                Add
            </button>
        </h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>fullname</th>
                                <th>Customer Name</th>
                                <th>Date of Birth</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $customer)

                                <tr>

                                    <td>{{ optional($customer->cinfo)->fname }}</td>
                                    <td>{{ $customer->customerName }}</td>
                                    <td>{{ $customer->dob }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        <!-- Edit Button trigger modal -->
                                        <button type="button" class="btn btn-primary editbutton" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $customer->id }}">
                                            Edit
                                        </button>
                                        {{-- <a href="{{ route('customers.editl', ['id' => $customer->id]) }}">edit</a> --}}
                                    </td>
                                    <td> <a href="javascript:void(0)" class="deleteButton"
                                            data-id="{{ $customer->id }}">delete
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- Edit Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Customer edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editdata">
                    loading...
                </div>

            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModal1Label">Customer Registration</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="adddata">
                    loading...
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {



            $('.editbutton').click(function(event) {

                var id = $(this).data("id");

                var url = "{{ route('customers.edit') }}?id=" + id;

                $("#editdata").load(url);


            })
            $('.addbutton').click(function(event) {



                var url = "{{ route('customer.register') }}";

                $("#adddata").load(url);


            })


            $('.deleteButton').click(function(event) {
                var elmnt = $(this);
                var id = $(this).data("id");
                console.log(id);
                var url = "{{ route('customers.delete') }}?id=" + id;

                $.get(url, function(data) {
                        console.log(data);
                        if (data.status == true) {
                            elmnt.parent().parent().remove();
                            $("#response1").html("<span style='color:green'>" + data.message +
                                "</span>");
                        } else {
                            $("#response1").html("<span style='color:red'>" + data.message + "</span>");
                        }
                    }

                );
            });
        });
    </script>
    <!-- Bootstrap JS (optional) -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>
