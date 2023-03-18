@extends('layouts.backend.main')

@section('title', 'Reports | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">Reports</h4>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="mt-0 mb-0">Institution Report</h4>
                    </div>
                    <hr class="my-0"/>
                    <div class="card-footer">
                        <form>
                            <div class="form-group mb-4">
                                <label for="monthOf" class="mb-2">for the month of</label>
                                <input type="month" class="form-control" name="monthOf" id="monthOf" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Generate</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="mt-0 mb-0">Site Traffic Report</h4>
                    </div>
                    <hr class="my-0"/>
                    <div class="card-footer">
                        <form>
                            <div class="form-group mb-4">
                                <label for="monthOf" class="mb-2">for the month of</label>
                                <input type="month" class="form-control" name="monthOf" id="monthOf" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Generate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
