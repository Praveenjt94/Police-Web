<?php
include_once('_shared/header.php');
include_once('backend/dbConnect.php');
// read notifications
$sql = "SELECT * FROM notifications";
$results = $conn->query($sql);
?>


<style>
    .warn_input {
        color: red;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section style="padding: 15px">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addOfficerModal">Add Officer</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#sendNotification">Send Notification</button>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Notifications</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>Admin</th>
                        <th>Officer</th>
                        <th>Driver</th>
                        <th width="50%">Message</th>
                        <th>Created At</th>
                    </tr>
                    <?php
                    $count = 1;
                    while ($row = $results->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $count++; ?>.</td>
                            <td><?php if ($row['admin'] == 1) {
                                    echo "true";
                                } else {
                                    echo "false";
                                } ?></td>
                            <td><?php if ($row['officer'] == 1) {
                                    echo "true";
                                } else {
                                    echo "false";
                                } ?></td>
                            <td><?php if ($row['driver'] == 1) {
                                    echo "true";
                                } else {
                                    echo "false";
                                } ?></td>
                            <td>
                                <?php echo $row['message']; ?>
                            </td>
                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>

    <div class="modal fade" id="addOfficerModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Officer</h5>
                </div>
                <form action="api/service.php" method="post" onsubmit="return validateOfficerForm();">
                    <div class="modal-body">
                        <input type="hidden" name="register" value="true">
                        <div class="form-group has-feedback">
                            <input id="name" type="text" class="form-control" placeholder="Full name" name="name"
                                   onkeypress="clearWarn('warn_name')"
                                   onchange="clearWarn('warn_name')"
                                   required>
                            <span class="glyphicon glyphicon-user form-control-feedback warn_name"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="officer_id" type="text" class="form-control" placeholder="Officer ID"
                                   onkeypress="clearWarn('warn_officer_id')"
                                   onchange="clearWarn('warn_officer_id')"
                                   name="officer_id" required>
                            <span class="glyphicon glyphicon-info-sign form-control-feedback warn_officer_id"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="nic" type="text" class="form-control" placeholder="NIC" name="nic"
                                   onkeypress="clearWarn('warn_nic')"
                                   onchange="clearWarn('warn_nic')"
                                   required>
                            <span class="glyphicon glyphicon-folder-close form-control-feedback warn_nic"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="telephone" type="text" class="form-control" placeholder="Telephone"
                                   onkeypress="clearWarn('warn_telephone')"
                                   onchange="clearWarn('warn_telephone')"
                                   name="telephone">
                            <span class="glyphicon glyphicon-phone-alt form-control-feedback warn_telephone"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control" placeholder="Email" name="email"
                                   onkeypress="clearWarn('warn_email')"
                                   onchange="clearWarn('warn_email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback warn_email"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>User Type</label>
                            <select class="form-control" name="user_type">
                                <option value="officer" selected>Officer</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="-1" id="remove_res_id">
                        <button type="submit" class="btn btn-primary main-opt-btn">Send
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sendNotification">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Notification</h5>
                </div>
                <form action="api/service.php" method="post" class="form-horizontal">
                    <input type="hidden" name="send_notification" value="true">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">User Category</label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="checkbox" style="padding-left: 15px;">
                                        <label>
                                            <input type="checkbox" name="driver" value="driver">
                                            Driver
                                        </label>
                                    </div>

                                    <div class="checkbox" style="padding-left: 15px;">
                                        <label>
                                            <input type="checkbox" name="officer" value="officer">
                                            Officer
                                        </label>
                                    </div>

                                    <div class="checkbox" style="padding-left: 15px;">
                                        <label>
                                            <input type="checkbox" name="admin" value="admin">
                                            Admin
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Message</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="message"
                                          placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary main-opt-btn">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once('_shared/footer.php');
?>
