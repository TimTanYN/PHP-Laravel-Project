@extends('stafflayout')
@section('title', 'Staff Create')
@section('body')

<form class="form" method="post" action="/staff" enctype="multipart/form-data">
    @csrf
    <div class="auto-style1">
    <p> &nbsp&nbsp </p>
    
    <label>Password</label>
    <input name="password" maxlength="16" value="{{ old('password') }}" ID="staffPassword">
    <span class="err">@error('password') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>First Name</label>
    <input name="firstname" maxlength="30" value="{{ old('first_name') }}" ID="staffFirst">
    <span class="err">@error('firstname') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Last Name</label>
    <input name="lastname" maxlength="30" value="{{ old('last_name') }}" ID="staffLast">
    <span class="err">@error('lastname') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Email</label>
    <input name="email" maxlength="30" value="{{ old('email') }}" ID="staffEmail">
    <span class="err">@error('email') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Phone Number</label>
    <input name="phonenumber" maxlength="14" value="{{ old('phone_number') }}" ID="staffPhone">
    <span class="err">@error('phonenumber') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Position</label>
    <input name="position" maxlength="10" value="{{ old('position') }}" ID="staffPosition">
    <span class="err">@error('position') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Gender</label>
    <input name="gender" maxlength="2" value="{{ old('gender') }}" ID="staffGender">
    <span class="err">@error('gender') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <section>
        <button id="Button2">Submit</button>
        <button type="reset" id="Button2">Reset</button>
    </section>
    </div>
</form>
@endsection
