
    <div class="container">

    <form method="POST" action="{{route("customers.update",$customers->id)}}" id="submitDataBtn" >
        @csrf
    
        <div class="mb-3">
            <label for="customerName" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customerName" name="customerName" value="{{$customers->customerName}}" >
        </div>
    
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
    
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ $customers->dob }}" >
        </div>
    
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$customers->email }}" >
        </div>
    
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $customers->phone }}" >
        </div>
    
        <button type="submit" class="btn btn-primary">Update</button>
        
        <div id="response1" class="mb-3">
            
   
          </div>

    </form>
    </div>
