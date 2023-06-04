@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Dashboard') }}
    </div>
    @php
    $user=count(App\Models\User::all());
    $category=count(App\Models\Category::all());
    $post=count(App\Models\Post::all());
    $slider=count(App\Models\Slider::all());
    @endphp
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-primary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">{{ $user }} <span class="fs-6 fw-normal">(
                                    <svg class="icon">
                                        <use xlink:href='{{  asset("icons/coreui.svg#cil-arrow-bottom")}}'></use>
                                    </svg>)</span></div>
                            <div>Users</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href='{{  asset("icons/coreui.svg#cil-options")}}'></use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                    class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                    href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart1" height="70" width="190"
                            style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                        <div class="chartjs-tooltip" style="opacity: 0; left: 141px; top: 133.712px;">
                            <table style="margin: 0px;">
                                <thead class="chartjs-tooltip-header">
                                    <tr class="chartjs-tooltip-header-item" style="border-width: 0px;">
                                        <th style="border-width: 0px;">May</th>
                                    </tr>
                                </thead>
                                <tbody class="chartjs-tooltip-body">
                                    <tr class="chartjs-tooltip-body-item">
                                        <td style="border-width: 0px;"><span
                                                style="background: rgb(50, 31, 219); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My
                                            First dataset: 51</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-info">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">{{ $category }} <span class="fs-6 fw-normal">(
                                    <svg class="icon">
                                        <use xlink:href='{{  asset("icons/coreui.svg#cil-arrow-top")}}'></use>
                                    </svg>)</span></div>
                            <div>Category</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href='{{  asset("icons/coreui.svg#cil-options")}}'></use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                    class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                    href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart2" height="70" width="190"
                            style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                        <div class="chartjs-tooltip" style="opacity: 0; left: 201px; top: 130.25px;">
                            <table style="margin: 0px;">
                                <thead class="chartjs-tooltip-header">
                                    <tr class="chartjs-tooltip-header-item" style="border-width: 0px;">
                                        <th style="border-width: 0px;">July</th>
                                    </tr>
                                </thead>
                                <tbody class="chartjs-tooltip-body">
                                    <tr class="chartjs-tooltip-body-item">
                                        <td style="border-width: 0px;"><span
                                                style="background: rgb(51, 153, 255); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My
                                            First dataset: 11</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-warning">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">{{ $slider }} <span class="fs-6 fw-normal">(
                                    <svg class="icon">
                                        <use xlink:href='{{  asset("icons/coreui.svg#cil-arrow-top")}}'></use>
                                    </svg>)</span></div>
                            <div>Slider</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href='{{  asset("icons/coreui.svg#cil-options")}}'></use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                    class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                    href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                        <canvas class="chart" id="card-chart3" height="70" width="222"
                            style="display: block; box-sizing: border-box; height: 70px; width: 222px;"></canvas>
                        <div class="chartjs-tooltip" style="opacity: 0; left: 37px; top: 105.3px;">
                            <table style="margin: 0px;">
                                <thead class="chartjs-tooltip-header">
                                    <tr class="chartjs-tooltip-header-item" style="border-width: 0px;">
                                        <th style="border-width: 0px;">February</th>
                                    </tr>
                                </thead>
                                <tbody class="chartjs-tooltip-body">
                                    <tr class="chartjs-tooltip-body-item">
                                        <td style="border-width: 0px;"><span
                                                style="background: rgba(255, 255, 255, 0.2); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My
                                            First dataset: 81</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-danger">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">{{ $post }} <span class="fs-6 fw-normal">(
                                    <svg class="icon">
                                        <use xlink:href='{{  asset("icons/coreui.svg#cil-arrow-bottom")}}'></use>
                                    </svg>)</span></div>
                            <div>Posts</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href='{{  asset("icons/coreui.svg#cil-options")}}'></use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                    class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                    href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart4" height="70" width="190"
                            style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
