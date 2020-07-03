<?php $user = UserData::getById($_GET["id"]);
$groups = UserGroupsData::getAll();
?>




<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Edit system users <i class="ti-user"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Edit system users</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <!-- Session comments -->
                        <?= Util::display_msg(Session::$msg); ?>
                        <!-- End session comments-->
                    </div>
                    <h6 class="card-subtitle">Edit system users</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="./?view=newuser" class="btn btn-primary">
                                <i class="ti-user"></i> New user</a>
                        </div>
                    </div>
                    <hr />


                    <form class="form-horizontal" method="post" id="addproduct" action="./?view=updateuser" role="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $user->name; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="bmd-label-floating">Last name</label>
                                    <input type="text" name="lastname" required class="form-control" id="lastname" value="<?= $user->lastname; ?>" r>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cc" class="bmd-label-floating">C.C.</label>
                                    <input type="text" name="cc" required class="form-control" id="cc" value="<?= $user->cc; ?>" r>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="gender" class="bmd-label-floating">Gender</label>
                                    <select id="gender" name="gender" class="custom-select" required>
                                        <option value="0" <?= ($user->gender == "0") ? "selected" : ""; ?>>Female</option>
                                        <option value="1" <?= ($user->gender == "1") ? "selected" : ""; ?>>Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="bmd-label-floating">User name (Email)</label>
                                    <input type="email" name="username" class="form-control" value="<?= $user->username; ?>" required id="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $user->email; ?>" r>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="bmd-label-floating">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso
                                        contrario no se modifica.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="user_level" class="bmd-label-floating">Rol de usuario</label>
                                    <select id="user_level" name="user_level" class="custom-select" required>
                                        <?php foreach ($groups as $group) : ?>
                                            <option value="<?= $group->group_level; ?>" <?= ($user->user_level == $group->group_level) ? "selected" : ""; ?>><?= $group->group_name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_active" class="bmd-label-floating">Is active</label>
                                    <input type="checkbox" name="is_active" id="is_active" <?= ($user->is_active) ? "checked" : ""; ?>>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="hidden" name="user_id" value="<?= $user->id; ?>" />
                                    <button type="submit" class="btn btn-primary">Update user</button>
                                </div>
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->