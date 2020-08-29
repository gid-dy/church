@extends('layouts.adminLayout.admin_design')
@section('content')
    {{-- main-container-part --}}
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->
        @if (Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if (Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-list"></i>
                                    </div>
                                    <div class="mr-5">{{ $FirstServiceScholars }} First Service Scholars</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ url('admin/view-children_first-service') }}">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-comments"></i>
                                    </div>
                                    <div class="mr-5">{{ $SecondServiceScholars }} Second Service Scholars</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ url('admin/view-children_second-service') }}">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-shopping-cart"></i>
                                    </div>
                                    <div class="mr-5">{{ $FirstServiceAdults }} First Service Adults</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ url('admin/view-adult_first-service') }}">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-info o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-support"></i>
                                    </div>
                                    <div class="mr-5">{{ $SecondServiceAdults }} Second Service Adults</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ url('admin/view-adult_second-service') }}">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-comments"></i>
                                    </div>
                                    <div class="mr-5">{{ $Classleaders }} Class Leaders</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ url('admin/view-class_leaders') }}">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-list"></i>
                                    </div>
                                    <div class="mr-5">{{ $Organisations }} Organisations</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="{{ url('admin/view-organisations') }}">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>



            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" ><span class="icon"><i class="icon-chevron-down"></i></span>
                            <h5>Tithe Reporting</h5>
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered" style="border: 1px solid #CCC; border-collapse: collapse; padding-bottom:300px">
                                <thead>
                                    <tr>
                                        <th>DAY</th>
                                        <th>DATE</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($current_tithe as $current)
                                        <tr>
                                            <td class="text-center date">Today</td>
                                            <td class="text-center date">{{ $current->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($last_tithe as $last)
                                        <tr>
                                            <td class="text-center date">Last Week</td>
                                            <td class="text-center date">{{ $last->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $last->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" ><span class="icon"><i class="icon-chevron-down"></i></span>
                            <h5>Offering Reporting</h5>
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered" style="border: 1px solid #CCC; border-collapse: collapse; padding-bottom:300px">
                                <thead>
                                    <tr>
                                        <th>DAY</th>
                                        <th>DATE</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($current_offering as $key => $current)
                                        <tr>
                                            <td class="text-center date">Today</td>
                                            <td class="text-center date">{{ $current->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($last_offering as $key => $current)
                                        <tr>
                                            <td class="text-center date">Last Week</td>
                                            <td class="text-center date">{{ $current->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" ><span class="icon"><i class="icon-chevron-down"></i></span>
                            <h5>Thanksgiving Reporting</h5>
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered" style="border: 1px solid #CCC; border-collapse: collapse; padding-bottom:300px">
                                <thead>
                                    <tr>
                                        <th>DAY</th>
                                        <th>DATE</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($current_thanksgiving as $key => $current)
                                        <tr>
                                            <td class="text-center date">Today</td>
                                            <td class="text-center date">{{ $current->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($last_thanksgiving as $key => $current)
                                        <tr>
                                            <td class="text-center date">Last Week</td>
                                            <td class="text-center date">{{ $current->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" ><span class="icon"><i class="icon-chevron-down"></i></span>
                            <h5></h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" ><span class="icon"><i class="icon-chevron-down"></i></span>
                            <h5>Total Money Reporting</h5>
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered" style="border: 1px solid #CCC; border-collapse: collapse; padding-bottom:300px">
                                <thead>
                                    <tr>
                                        <th>DAY</th>
                                        <th>DATE</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($current_total_collection as $key => $current)
                                        <tr>
                                            <td class="text-center date">Today</td>
                                            <td class="text-center date">{{ $current->date }}</td>
                                            <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($last_total_collection as $key => $current)
                                    <tr>
                                        <td class="text-center date">Last Week</td>
                                        <td class="text-center date">{{ $current->date }}</td>
                                        <td class="text-center amount one"> GHS {{ $current->amount }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--end-main-container-part-->
@endsection
