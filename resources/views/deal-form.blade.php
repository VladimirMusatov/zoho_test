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
    Create Deal
  </div>
  <div class="card-body">
    <form action="{{route('deal-store')}}">
      <div class="mb-3">
        <label class="form-label">Deal name</label>
        <input type="text" class="form-control" name="Deal_Name" value="{{ old('Deal_Name') }}">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Deal stage</label>
        <input type="text" class="form-control" name="Stage" value="{{ old('Stage') }}">
      </div>
      <div class="mb-3 d-none" id="account_form">
        <div>
            <label class="form-label">Account  name</label>
            <input type="text" class="form-control" name="Account_Name" value="{{ old('Account_Name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Account website</label>
            <input type="text" class="form-control" name="Account_website" value="{{ old('Account_website') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Account phone</label>
            <input type="text" class="form-control" name="Account_phone" value="{{ old('Account_phone') }}">
        </div>
      </div>
      <div class="mb-3 form-check">
        <input class="form-check-input" name="create_account" id="account_check" type="checkbox" value="">
        <label class="form-check-label" for="flexCheckDefault">
            Create deal with account
        </label>
      </div>
      <div class="d-flex">
        <button type="submit" style="margin-right: 5px;" class="btn btn-primary">Submit</button>       
      </div>
    </form>
  </div>
</div>
<script src="js/checkbox.js" type="text/javascript"></script>
@endsection