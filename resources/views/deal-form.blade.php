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
        <input type="text" class="form-control" name="Deal_Name">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Deal stage</label>
        <input type="text" class="form-control" name="Stage">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
