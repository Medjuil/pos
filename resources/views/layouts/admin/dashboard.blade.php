@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Dashboard</h3>
</section>
<div class="row g-1">
    <div class="col-sm-12 col-md-6">
        <div class="card card-body">
            <h6>Users</h6>
            <canvas id="user-chart"></canvas>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card card-body">
            <h6>Customers</h6>
            <canvas id="customer-chart"></canvas>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card card-body">
            <h6>Products</h6>
            <canvas id="product-chart"></canvas>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card card-body">
            <h6>Supppliers</h6>
            <canvas id="supplier-chart"></canvas>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="module">

const data = [
    { year: 2010, count: 10 },
    { year: 2011, count: 20 },
    { year: 2012, count: 15 },
    { year: 2013, count: 25 },
    { year: 2014, count: 22 },
    { year: 2015, count: 30 },
    { year: 2016, count: 28 },
  ];
// Note! The initialization of this is Chart can be found in app.js so that it can be access in any pages
// sample chart for users
new Chart(
document.getElementById('user-chart'),
    {
        type: 'line',
        data: {
        labels: data.map(row => row.year),
        datasets: [
            {
            label: 'System Users',
            data: data.map(row => row.count)
            }
        ]
        }
    }
);

//   sample chart for users
new Chart(
document.getElementById('customer-chart'),
    {
        type: 'bar',
        data: {
        labels: data.map(row => row.year),
        datasets: [
            {
            label: 'Customers',
            data: data.map(row => row.count)
            }
        ]
        }
    }
);

//   sample chart for users
new Chart(
document.getElementById('product-chart'),
    {
        type: 'doughnut',
        data: {
        labels: data.map(row => row.year),
        datasets: [
            {
            label: 'Products',
            data: data.map(row => row.count)
            }
        ]
        }
    }
);

//   sample chart for users
new Chart(
document.getElementById('supplier-chart'),
    {
        type: 'polarArea',
        data: {
        labels: data.map(row => row.year),
        datasets: [
            {
            label: 'Suppliers',
            data: data.map(row => row.count)
            }
        ]
        }
    }
);
</script>
@endpush