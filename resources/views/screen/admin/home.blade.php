@extends('layout.admin.master')

@section('title', 'Home Page')

@section('title-heading', 'Home')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">HELLO {{Auth::user()->name}}</h3>
            </div>
            <!--begin::Form-->
           
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection