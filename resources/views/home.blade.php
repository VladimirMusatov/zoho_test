@extends('layouts.main')

@section('content')
<div class="d-flex mt-3">
    <div style="margin-right: 5px ;">
        <a class="btn btn-dark" href="{{route('deal-form')}}">Create Deal</a>
    </div>
    <div>
        <a class="btn btn-secondary" href="{{route('account-form')}}">Create Accounts</a>
    </div>
</div>
@endsection
