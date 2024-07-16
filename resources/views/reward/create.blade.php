@extends('rewardlayout')
@section('title', 'Reward Create')
@section('body')

<form class="form" method="post" action="/reward" enctype="multipart/form-data">
    @csrf
    <div class="auto-style1">
    <p> &nbsp&nbsp </p>
    
    <label>Code</label>
    <input name="code" maxlength="30" value="{{ old('code') }}" ID="code">
    <span class="err">@error('code') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Name</label>
    <input name="name" maxlength="15" value="{{ old('name') }}" ID="name">
    <span class="err">@error('name') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Type</label>
    <input name="type" maxlength="12" value="{{ old('type') }}" ID="type">
    <span class="err">@error('type') {{ $message }} @enderror</span>
    <p>&nbsp</p>

    <label>Description</label>
    <input name="desc" maxlength="100" value="{{ old('description') }}" ID="desc">
    <span class="err">@error('desc') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Discount Percent</label>
    <input name="disc" maxlength="3" value="{{ old('discount') }}" ID="disc">
    <span class="err">@error('discount') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
      <label class="upload"> Background Photo
    <input type="file"  name="photo" accept="image/*">
  </label>

    <section>
        <button id="Button2">Submit</button>
        <button type="reset" id="Button2">Reset</button>
    </section>
    </div>
</form>
@endsection
