<div class="container">

    <div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
    <div id="response1"></div>
        <button type= "button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form method="POST" action="" id="submitDataBtn">
        @csrf

        <div class="mb-3">
            <label for="customerName" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customerName" name="customerName"
                value="{{ old('customerName') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>


        

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#submitDataBtn').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            console.log(formData);
            // Send POST request
            $.post('{{ route('customers.submit') }}', formData, function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $("#response1").html("<span style='color:green'>" + data.message +
                            "</span>"); 
                            $("#response1").parent().removeClass("d-none");
                    } else {
                        $("#response1").html("<span style='color:red'>" + data.message + "</span>");
                            $("#response1").parent().removeClass("d-none");
                    }
                }

            );
        });
    });
</script>



</html>
