@extends('layout.admin.master')

@section('title', 'comment')

@section('title-heading', 'Comment')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <!--begin::table-->
            
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">comment
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-default datatable-bordered datatable-loaded">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">
                                    <th class="datatable-cell" style="flex-grow:1"><span>Tên danh mục</span></th>
                                    <th class="datatable-cell" style="width: 20%"><span>Trạng thái</span></th>
                                    <th class="datatable-cell text-right" style="width: 20%"><span>Tùy chọn</span></th>
                                </tr>
                            </thead>
                            <tbody id="table-categories" class="datatable-body">
                                {{showCategories($comments)}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::table-->
        </div>
    </div>
@endsection
