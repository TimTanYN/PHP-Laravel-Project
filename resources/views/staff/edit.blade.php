@extends('stafflayout')
@section('title', 'Staff Edit')
@section('body')

<form class="form" method="post" action="/staff/{{ $s->staff_id }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <p>&nbsp</p>
    <label>Staff Id :</label>
    <b>{{ $s->staff_id }}</b>
    <p>&nbsp</p>
    
    <label>Password</label>
    <input name="password" maxlength="16" ID="staffPassword">
    <span class="err">@error('password') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>First Name</label>
    <input name="firstname" maxlength="30" value="{{ old('first_name', $s) }}" ID="staffFirst">
    <span class="err">@error('firstname') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Last Name</label>
    <input name="lastname" maxlength="30" value="{{ old('last_name', $s) }}" ID="staffLast">
    <span class="err">@error('lastname') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Email</label>
    <input name="email" maxlength="30" value="{{ old('email', $s) }}" ID="staffEmail">
    <span class="err">@error('email') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Phone Number</label>
    <input name="phonenumber" maxlength="14" value="{{ old('phone_number', $s) }}" ID="staffPhone">
    <span class="err">@error('phonenumber') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Position</label>
    <input name="position" maxlength="10" value="{{ old('position', $s) }}" ID="staffPosition">
    <span class="err">@error('position') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Gender</label>
    <input name="gender" maxlength="2" value="{{ old('gender', $s) }}" ID="staffGender">
    <span class="err">@error('gender') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <section>
        <button id="Button2">Update</button>
        <button type="reset" id="Button3">Reset</button>
    </section>
</form>
@endsection
