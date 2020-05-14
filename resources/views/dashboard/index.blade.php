@extends('layouts.master')
@section('dashboard-active','active')

@section('content')
	<!-- Main Content -->
	<div id="main-content" class="container-fluid">
		<div class="row top-60px">
			<div class="col-md-3">
                <h4>Expense Categories </h4>
                <div id="category">
                </div>
            </div>
            
            <div class="col-md-3">
                <h4>Total</h4>
                <div id="TotalExpenses">
                </div>
			</div>
		</div>

		<div class="row top-10px">
			<div class="col-md-12">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
			</div>
		</div>
	</div>
	

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/custom-js/dashboard/dashboard.js') }} "></script>
@stop