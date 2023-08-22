@extends('rioUser.master')

@section('title')
    <title>Dashboard</title>
@endsection

@section('style')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('sidebar')
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('dashboard') }}">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('order.history') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('product.history') }}">
                        <svg class="bi"><use xlink:href="#cart"/></svg>
                        Products
                    </a>
                </li>
            </ul>


            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('user.account.settings') }}">
                        <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                    <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('main-content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-capitalize">Welcome to - {{ Auth::user()->name }} !</h1>
    </div>

    <div class="container">
        <div class="row">
{{--            <div class="col-md-6">--}}
{{--                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>--}}
{{--            </div>--}}
            <div class="col-md-8 m-auto">
                <form class="card my-5 p-5" action="#" method="post">

                    <div class="card-body row">
                        <label for="order_id" class="col-md-6" style="letter-spacing: 2px;">Truck Your Order : </label>
                        <div class="col-md-6">
                            <input  class="form-control" type="number" min="0" name="order_id" id="order_id" placeholder="ORDER ID : 123">
                        </div>
                    </div>
                    <div class="card-body row">
                        <label for="order_id" class="col-md-6"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="letter-spacing: 2px;">TRUCK</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <h2>Recent Order</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Order Status</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Shipping Method</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as  $order)

                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>
                            <div class="badge bg-primary">
                                {{ $order->status }}
                            </div>
                        </td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->pay_method }}</td>
                        <td>{{ $order->ship_method }}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection
