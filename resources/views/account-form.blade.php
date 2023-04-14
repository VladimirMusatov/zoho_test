@extends('layouts.main')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show mt-3 w-50" style="margin: 0 auto;" role="alert">
        {{(session()->get('message')) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3 w-50" style="margin: 0 auto;" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card mt-5 w-50" style="margin: 0 auto;">
  <div class="card-header">
    Create Account
  </div>
  <div class="card-body">
    <form action="{{route('account-store')}}">
      <div class="mb-3">
        <label class="form-label">Account  name</label>
        <input type="text" class="form-control" name="Account_Name" value="{{ old('Account_Name') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Account website</label>
        <input type="url" class="form-control" name="Account_website" value="{{ old('Account_website') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Account phone</label>
        <input type="tel" class="form-control" name="Account_phone" value="{{ old('Account_phone') }}">
      </div>
      <div class="d-flex">
        <button type="submit" style="margin-right: 5px;" class="btn btn-primary">Submit</button>        
      </div>
    </form>
  </div>
</div>
@endsection
