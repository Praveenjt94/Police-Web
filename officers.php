<?php
include_once('_shared/header.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Officers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!--        <button class="btn btn-primary" data-toggle="modal" data-target="#addOfficerModal">Add Officer</button>-->
    </section>

    <div class="modal fade" id="addOfficerModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Officer</h5>
                </div>
                <form action="api/service.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="register" value="true">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Full name" name="name" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Officer ID" name="officer_id" required>
                            <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="NIC" name="nic" required>
                            <span class="glyphicon glyphicon-folder-close form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Telephone" name="telephone">
                            <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
                        <button type="submit" class="btn btn-primary main-opt-btn">Save
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
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
