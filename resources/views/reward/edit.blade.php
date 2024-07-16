@extends('rewardlayout')
@section('title', 'Reward Edit')
@section('body')

<form class="form" method="post" action="/reward/{{ $r->id }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <p>&nbsp</p>
    <label>Reward Id : </label>
    <b>{{ $r->id }}</b>
    <p>&nbsp</p>
    
    <label>Code</label>
    <input name="code" maxlength="30" value="{{ old('code', $r) }}" ID="code">
    <span class="err">@error('code') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Name</label>
    <input name="name" maxlength="15" value="{{ old('name', $r) }}" ID="name">
    <span class="err">@error('name') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Type</label>
    <input name="type" maxlength="12" value="{{ old('type', $r) }}" ID="name">
    <span class="err">@error('type') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Description</label>
    <input name="desc" maxlength="100" value="{{ old('description', $r) }}" ID="desc">
    <span class="err">@error('desc') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
    <label>Discount percent</label>
    <input name="discount" maxlength="3" value="{{ old('discount', $r) }}" ID="discount">
    <span class="err">@error('discount') {{ $message }} @enderror</span>
    <p>&nbsp</p>
    
          <label class="upload"> Background Photo </label><br
    <input type="file"  name="photo" accept="image/*">
 
    <section>
        <button id="Button2" type="submit">Update</button>
        <button type="reset" id="Button3">Reset</button>
    </section>
</form>
@endsection
