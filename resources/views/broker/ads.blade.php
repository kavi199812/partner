@extends('layouts.dashboard-layouts.navbar-n-sidebars')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Advertisements</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Your Advertisements</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="filters">
        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#mobile-filter"
                aria-expanded="true" aria-controls="mobile-filter">Filter<span class="px-1 fas fa-filter"></span>
        </button>
    </div>
{{--    <div id="mobile-filter">--}}
{{--        <div class="py-3">--}}
{{--            <h5 class="font-weight-bold">Categories</h5>--}}
{{--            @foreach($categories as $category)--}}
{{--                <div class="category form-inline d-flex align-items-center py-1"><label for="cat{{$category->id}}" class='cat-check tick'>--}}
{{--                        <input type="checkbox" name="cat[]" value="{{$category->id}}" id="cat{{$category->id}}" checked>--}}
{{--                        {{$category->category_name}}<span class="check"></span> </label>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="content py-md-0 py-3">
        <section id="sidebar">
            <div class="py-3">
                <h5 class="font-weight-bold">Categories</h5>
                @foreach($categories as $category)
                    <div class="category form-inline d-flex align-items-center py-1"><label for="cat{{$category->id}}" class='cat-check tick'>
                            <input type="checkbox" name="cat[]" value="{{$category->id}}" id="cat{{$category->id}}" checked>
                        {{$category->category_name}}<span class="check"></span> </label>
                    </div>
                @endforeach
            </div>
        </section> <!-- Products Section -->
        <section id="products">
            @include('broker.productsList')
        </section>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .h3 {
            font-weight: 900;
        }

        .btn {
            color: #666;
            font-size: 0.85rem;
        }

        .btn:hover {
            color: #0d6efd;
        }

        .green-label {
            background-color: #f1d27b;
            color: #0a0a0a;
            border-radius: 5px;
            font-size: 0.8rem;
            margin: 0 3px;
        }

        .radio, .checkbox {
            padding: 6px 10px;
        }

        .border {
            border-radius: 12px;
        }

        .options {
            position: relative;
            padding-left: 25px;
        }

        .radio label,
        .checkbox label {
            display: block;
            font-size: 14px;
            cursor: pointer;
            margin: 0;
        }

        .options input {
            opacity: 0;
        }

        .checkmark {
            position: absolute;
            top: 0px;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #f8f8f8;
            border: 1px solid #eeca66;
            border-radius: 50%;
        }

        .options input:checked ~ .checkmark:after {
            display: block;
        }

        .options .checkmark:after {
            content: "";
            width: 9px;
            height: 9px;
            display: block;
            background: white;
            position: absolute;
            top: 52%;
            left: 51%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked ~ .checkmark {
            background: #ffc215;
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked ~ .checkmark:after {
            transform: translate(-50%, -50%) scale(1);
        }

        .count {
            font-size: 0.8rem;
        }

        label {
            cursor: pointer;
        }

        .tick {
            display: block;
            position: relative;
            padding-left: 23px;
            cursor: pointer;
            font-size: 0.8rem;
            margin: 0;
        }

        .tick input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .check {
            position: absolute;
            top: 1px;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .tick:hover input ~ .check {
            background-color: #f3f3f3;
        }

        .tick input:checked ~ .check {
            background-color: #ffc215;
        }

        .check:after {
            content: "";
            position: absolute;
            display: none;
        }

        .tick input:checked ~ .check:after {
            display: block;
            transform: rotate(45deg) scale(1);
        }

        .tick .check:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg) scale(2);
        }

        #country {
            font-size: 0.8rem;
            border: none;
            border-left: 1px solid #ccc;
            padding: 0px 10px;
            outline: none;
            font-weight: 900;
        }

        .close {
            font-size: 1.2rem;
        }

        div.text-muted {
            font-size: 0.85rem;
        }

        #sidebar {
            width: 25%;
            float: left;
        }

        .category {
            font-size: 0.9rem;
            cursor: pointer;
        }

        .list-group-item {
            border: none;
            padding: 0.3rem 0.4rem 0.3rem 0rem;
        }

        .badge-primary {
            background-color: #f1d27b;
            color: #0a0a0a
        }

        .brand .check {
            background-color: #fff;
            top: 3px;
            border: 1px solid #666;
        }

        .brand .tick {
            font-size: 1rem;
            padding-left: 25px;
        }

        .rating .check {
            background-color: #fff;
            border: 1px solid #666;
            top: 0;
        }

        .rating .tick {
            font-size: 0.9rem;
            padding-left: 25px;
        }

        .rating .fas.fa-star {
            color: #ffbb00;
            padding: 0px 3px;
        }

        .brand .tick:hover input ~ .check,
        .rating .tick:hover input ~ .check {
            background-color: #f9f9f9;
        }

        .brand .tick input:checked ~ .check,
        .rating .tick input:checked ~ .check {
            background-color: #ffc215;
        }

        #products {
            width: 75%;
            padding-left: 30px;
            margin: 0;
            float: right;
        }

        .card:hover {
            transform: scale(1.1);
            transition: all 0.5s ease-in-out;
            cursor: pointer;
        }

        .card-body {
            padding: 0.5rem;
        }

        .card-body .description {
            font-size: 0.78rem;
            padding-bottom: 8px;
        }

        div.h6, h6 {
            margin: 0;
        }

        .product .fa-star {
            font-size: 0.9rem;
        }

        .rebate {
            font-size: 0.9rem;
        }

        .btn.btn-primary {
            background-color: #ffc215;
            color: #fff;
            border: 1px solid #ffc215;
            border-radius: 10px;
            font-weight: 800;
        }

        .btn.btn-primary:hover {
            background-color: #ffc215;
        }

        .product-img {
            width: 192px;
            height: 132px;
            object-fit: contain;
        }

        .clear {
            clear: both;
        }

        .btn.btn-success {
            visibility: hidden;
        }

        @media (min-width: 992px) {
            .filter, #mobile-filter {
                display: none;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .radio, .checkbox {
                padding: 6px 10px;
                width: 49%;
                float: left;
                margin: 5px 5px 5px 0px;
            }

            .filter, #mobile-filter {
                display: none;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            #sidebar {
                width: 35%;
            }

            #products {
                width: 65%;
            }

            .filter, #mobile-filter {
                display: none;
            }

            .h3 + .ml-auto {
                margin: 0;
            }
        }

        @media (max-width: 575px) {
            .wrapper {
                padding: 10px;
            }

            .h3 {
                font-size: 1.3rem;
            }

            #sidebar {
                display: none;
            }

            #products {
                width: 100%;
                float: none;
            }

            #products {
                padding: 0;
            }

            .clear {
                float: left;
                width: 80%;
            }

            .btn.btn-success {
                visibility: visible;
                margin: 10px 0px;
                color: #fff;
                padding: 0.2rem 0.1rem;
                width: 20%;
            }

            .green-label {
                width: 50%;
            }

            .btn.text-success {
                padding: 0;
            }

            .content, #mobile-filter {
                clear: both;
            }
        }
    </style>

    <script>
        $(document).ready(function () {
            var categories = [];
            $('input[name="cat[]"]').on('change', function (e) {

                e.preventDefault();
                categories = []; // reset

                $('input[name="cat[]"]:checked').each(function () {
                    categories.push($(this).val());
                });

                $.ajax({
                    type: "GET",
                    data: {
                        'categories': categories,
                    },
                    url: "{{ route('ads') }}",

                    success: function (data) {
                        $('.search-result').html(data);
                    }
                })
            });
        });
    </script>

@endsection







