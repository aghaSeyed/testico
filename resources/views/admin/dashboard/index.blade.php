@extends('layouts.main')
@section('content')
    <div class="content-wrapper">


        <!-- Content area -->
        <div class="content">

            <!-- Main charts -->
            <div class="row">
                <div class="col-lg-7">

                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Traffic sources</h6>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#"
                                               class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i
                                                    class="icon-plus3"></i></a>
                                        </li>
                                        <li class="text-left">
                                            <div class="text-semibold">New students</div>
                                            <div class="text-muted">2,349 avg</div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="chart content-group" id="new-visitors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#"
                                               class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i
                                                    class="icon-people"></i></a>
                                        </li>
                                        <li class="text-left">
                                            <div class="text-semibold">Total online</div>
                                            <div class="text-muted"><span
                                                    class="status-mark border-success position-left"></span> 5,378 avg
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="row">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Top rank</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>

                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Avg</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Eugene</td>
                                                <td>Kopyov</td>
                                                <td>98</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Victoria</td>
                                                <td>Baker</td>
                                                <td>93</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>James</td>
                                                <td>Alexander</td>
                                                <td>60</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Franklin</td>
                                                <td>Morrison</td>
                                                <td>55</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /traffic sources -->

                </div>

                <div class="col-lg-5">

                    <!-- Sales stats -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Overview</h6>
                        </div>

                        <div class="container-fluid">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="content-group">
                                        <h5 class="text-semibold no-margin"><i
                                                class="icon-calendar5 position-left text-slate"></i> 5,689</h5>
                                        <span class="text-muted text-size-small">total questions</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="content-group">
                                        <h5 class="text-semibold no-margin"><i
                                                class="icon-calendar5 position-left text-slate"></i> 32,568</h5>
                                        <span class="text-muted text-size-small">total students</span>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                    <!-- /sales stats -->

                </div>
            </div>
            <!-- /main charts -->


            <!-- Dashboard content -->
            <div class="row">

            </div>
            <!-- /dashboard content -->


            <!-- Footer -->
            <div class="footer text-muted">

            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
@endsection
@section('scripts')
    @parent

@endsection
