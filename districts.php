<?php
include_once('_shared/header.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Districts
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <!--<div class="row">
            <div class="col-lg-3 col-xs-6">
                &lt;!&ndash; small box &ndash;&gt;
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            &lt;!&ndash; ./col &ndash;&gt;
            <div class="col-lg-3 col-xs-6">
                &lt;!&ndash; small box &ndash;&gt;
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            &lt;!&ndash; ./col &ndash;&gt;
            <div class="col-lg-3 col-xs-6">
                &lt;!&ndash; small box &ndash;&gt;
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            &lt;!&ndash; ./col &ndash;&gt;
            <div class="col-lg-3 col-xs-6">
                &lt;!&ndash; small box &ndash;&gt;
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            &lt;!&ndash; ./col &ndash;&gt;
        </div>-->
        <!-- /.row -->
        <!-- Main row -->
        <!--<div class="row">
            &lt;!&ndash; Left col &ndash;&gt;
            <section class="col-lg-7 connectedSortable">
                &lt;!&ndash; Custom tabs (Charts with tabs)&ndash;&gt;
                <div class="nav-tabs-custom">
                    &lt;!&ndash; Tabs within a box &ndash;&gt;
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>-->
        <!--    <li class="pull-left header"><i class="fa fa-inbox"></i> Violations</li>
        </ul>
        <div class="tab-content no-padding">
            &lt;!&ndash; Morris chart - Sales &ndash;&gt;
            <div class="chart tab-pane active" id="revenue-chart"
                 style="position: relative; height: 300px;"></div>
            <div class="chart tab-pane" id="sales-chart"
                 style="position: relative; height: 300px;"></div>
        </div>
    </div>
    &lt;!&ndash; /.nav-tabs-custom &ndash;&gt;

    &lt;!&ndash; Chat box &ndash;&gt;
    &lt;!&ndash;<div class="box box-success">
        <div class="box-header">
            <i class="fa fa-comments-o"></i>

            <h3 class="box-title">Chat</h3>

            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active"><i
                            class="fa fa-square text-green"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm"><i
                            class="fa fa-square text-red"></i></button>
                </div>
            </div>
        </div>
        <div class="box-body chat" id="chat-box">
            &lt;!&ndash; chat item &ndash;&gt;
            <div class="item">
                <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        Mike Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
                <div class="attachment">
                    <h4>Attachments:</h4>

                    <p class="filename">
                        Theme-thumbnail-image.jpg
                    </p>

                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                    </div>
                </div>
                &lt;!&ndash; /.attachment &ndash;&gt;
            </div>
            &lt;!&ndash; /.item &ndash;&gt;
            &lt;!&ndash; chat item &ndash;&gt;
            <div class="item">
                <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                        Alexander Pierce
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div>
            &lt;!&ndash; /.item &ndash;&gt;
            &lt;!&ndash; chat item &ndash;&gt;
            <div class="item">
                <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                        Susan Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div>
            &lt;!&ndash; /.item &ndash;&gt;
        </div>
        &lt;!&ndash; /.chat &ndash;&gt;
        <div class="box-footer">
            <div class="input-group">
                <input class="form-control" placeholder="Type message...">

                <div class="input-group-btn">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>&ndash;&gt;
    &lt;!&ndash; /.box (chat box) &ndash;&gt;

    &lt;!&ndash; TO DO List &ndash;&gt;
    &lt;!&ndash;<div class="box box-primary">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">To Do List</h3>

            <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        &lt;!&ndash; /.box-header &ndash;&gt;
        <div class="box-body">
            <ul class="todo-list">
                <li>
                    &lt;!&ndash; drag handle &ndash;&gt;
                    <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
                    &lt;!&ndash; checkbox &ndash;&gt;
                    <input type="checkbox" value="">
                    &lt;!&ndash; todo text &ndash;&gt;
                    <span class="text">Design a nice theme</span>
                    &lt;!&ndash; Emphasis label &ndash;&gt;
                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    &lt;!&ndash; General tools such as edit or delete&ndash;&gt;
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
      <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
                    <input type="checkbox" value="">
                    <span class="text">Make the theme responsive</span>
                    <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
      <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
                    <input type="checkbox" value="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
      <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
                    <input type="checkbox" value="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
      <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
                    <input type="checkbox" value="">
                    <span class="text">Check your messages and notifications</span>
                    <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
      <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
      </span>
                    <input type="checkbox" value="">
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
            </ul>
        </div>
        &lt;!&ndash; /.box-body &ndash;&gt;
        <div class="box-footer clearfix no-border">
            <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item
            </button>
        </div>
    </div>&ndash;&gt;
    &lt;!&ndash; /.box &ndash;&gt;

    &lt;!&ndash; quick email widget &ndash;&gt;
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-envelope"></i>

            <h3 class="box-title">Quick Email</h3>
            &lt;!&ndash; tools box &ndash;&gt;
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                        data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
            &lt;!&ndash; /. tools &ndash;&gt;
        </div>
        <div class="box-body">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                    <textarea class="textarea" placeholder="Message"
                              style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </form>
        </div>
        <div class="box-footer clearfix">
            <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>

</section>
&lt;!&ndash; /.Left col &ndash;&gt;
&lt;!&ndash; right col (We are only adding the ID to make the widgets sortable)&ndash;&gt;
<section class="col-lg-5 connectedSortable">

    &lt;!&ndash; Map box &ndash;&gt;
    <div class="box box-solid bg-light-blue-gradient">
        <div class="box-header">
            &lt;!&ndash; tools box &ndash;&gt;
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right"
                        data-toggle="tooltip" title="Date range">
                    <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                    <i class="fa fa-minus"></i></button>
            </div>
            &lt;!&ndash; /. tools &ndash;&gt;

            <i class="fa fa-map-marker"></i>

            <h3 class="box-title">
                Location
            </h3>
        </div>
        <div class="box-body">
            <div id="world-map" style="height: 250px; width: 100%;"></div>
        </div>
        &lt;!&ndash; /.box-body&ndash;&gt;
        &lt;!&ndash;<div class="box-footer no-border">
            <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-1"></div>
                    <div class="knob-label">Visitors</div>
                </div>
                &lt;!&ndash; ./col &ndash;&gt;
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-2"></div>
                    <div class="knob-label">Online</div>
                </div>
                &lt;!&ndash; ./col &ndash;&gt;
                <div class="col-xs-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="knob-label">Exists</div>
                </div>
                &lt;!&ndash; ./col &ndash;&gt;
            </div>
            &lt;!&ndash; /.row &ndash;&gt;
        </div>&ndash;&gt;
    </div>
    &lt;!&ndash; /.box &ndash;&gt;

    &lt;!&ndash; solid sales graph &ndash;&gt;
    <div class="box box-solid bg-teal-gradient">
        <div class="box-header">
            <i class="fa fa-th"></i>

            <h3 class="box-title">Accidents</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i
                        class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i
                        class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body border-radius-none">
            <div class="chart" id="line-chart" style="height: 250px;"></div>
        </div>
        &lt;!&ndash; /.box-body &ndash;&gt;
        &lt;!&ndash;<div class="box-footer no-border">
            <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60"
                           data-height="60" data-fgColor="#39CCCC">

                    <div class="knob-label">Mail-Orders</div>
                </div>
                &lt;!&ndash; ./col &ndash;&gt;
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60"
                           data-height="60" data-fgColor="#39CCCC">

                    <div class="knob-label">Online</div>
                </div>
                &lt;!&ndash; ./col &ndash;&gt;
                <div class="col-xs-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60"
                           data-height="60" data-fgColor="#39CCCC">

                    <div class="knob-label">In-Store</div>
                </div>
                &lt;!&ndash; ./col &ndash;&gt;
            </div>
            &lt;!&ndash; /.row &ndash;&gt;
        </div>&ndash;&gt;
        &lt;!&ndash; /.box-footer &ndash;&gt;
    </div>
    &lt;!&ndash; /.box &ndash;&gt;

    &lt;!&ndash; Calendar &ndash;&gt;
    <div class="box box-solid bg-green-gradient">
        <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Calendar</h3>
            &lt;!&ndash; tools box &ndash;&gt;
            <div class="pull-right box-tools">
                &lt;!&ndash; button with a dropdown &ndash;&gt;
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                            data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i
                        class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i
                        class="fa fa-times"></i>
                </button>
            </div>
            &lt;!&ndash; /. tools &ndash;&gt;
        </div>
        &lt;!&ndash; /.box-header &ndash;&gt;
        <div class="box-body no-padding">
            &lt;!&ndash;The calendar &ndash;&gt;
            <div id="calendar" style="width: 100%"></div>
        </div>
        &lt;!&ndash; /.box-body &ndash;&gt;
        &lt;!&ndash;<div class="box-footer text-black">
            <div class="row">
                <div class="col-sm-6">
                    &lt;!&ndash; Progress bars &ndash;&gt;
                    <div class="clearfix">
                        <span class="pull-left">Task #1</span>
                        <small class="pull-right">90%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">Task #2</span>
                        <small class="pull-right">70%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                    </div>
                </div>
                &lt;!&ndash; /.col &ndash;&gt;
                <div class="col-sm-6">
                    <div class="clearfix">
                        <span class="pull-left">Task #3</span>
                        <small class="pull-right">60%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">Task #4</span>
                        <small class="pull-right">40%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                    </div>
                </div>
                &lt;!&ndash; /.col &ndash;&gt;
            </div>
            &lt;!&ndash; /.row &ndash;&gt;
        </div>&ndash;&gt;
    </div>
    &lt;!&ndash; /.box &ndash;&gt;

</section>
&lt;!&ndash; right col &ndash;&gt;
</div>-->
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once('_shared/footer.php');
?>
