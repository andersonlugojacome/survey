<?php

/**
 * @author DigitalesWeb
 * @website http://digitalesweb.com/
 **/

$categories = CategoryMenuData::get_base_categories();

?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Category manager main menu <i class="mdi mdi-menu"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Create new menu category</li>
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
                    <h6 class="card-subtitle">Categories and user permits</h6>
                    <form role="form" method="post" action="./?action=addcategorymenu">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="icon" class="bmd-label-floating">icon</label>
                                    <input type="text" class="form-control" id="icon" name="icon" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url" class="bmd-label-floating">URL</label>
                                    <input type="text" class="form-control" id="url" name="url" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category_id">Parent category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">-- PARENT CATEGORY --</option>
                                        <?php if (count($categories) > 0) : ?>
                                            <?php foreach ($categories as $cat) : ?>
                                                <option value="<?= $cat->id; ?>"><?= $cat->name; ?>
                                                </option>
                                                <?php CategoryMenuData::select_tree_cat_id($cat->id, 1); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php $ug = UserGroupsData::getAll(); ?>
                                <?php if (count($ug) > 0) :
                                    foreach ($ug as $d) : ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category_<?php echo $d->id; ?>">
                                                <?php echo $d->group_name; ?>
                                            </label>
                                        </div>
                                <?php endforeach;
                                endif; ?>
                            </div>
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button class="btn btn-dark hBack" type="button"><i class="ti-back-left"></i> Back</button>
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