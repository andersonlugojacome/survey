<?php

/**
 * @author DigitalesWeb
 * @website http://digitalesweb.com/
 **/
$categories = CategoryMenuData::get_base_categories();
$user = Util::current_user();
Session::currentURL();

?>




<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Category manager main menu <i class="mdi mdi-menu"></i></h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Admin menu category</li>
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
                        <a href="./?view=adminnewcategorymenu" class="btn waves-effect waves-light btn-primary">
                            <i class="mdi mdi-new-box"></i> Create category
                        </a>
                    </div>
                    <h6 class="card-subtitle">Categories and user permits</h6>
                    <?php if (count($categories) > 0) : ?>
                        <ul>
                            <?php foreach ($categories as $cat) : ?>
                                <li class="">
                                    <p>
                                        <a href="#<?= $cat->id; ?>">
                                            <i class="mdi <?= $cat->icon; ?>"></i>

                                            <?= $cat->name; ?>
                                        </a>
                                        <?= CategoryMenuData::addHTMLUserGroupCategoryMenu($cat->id); ?>
                                        <?= CategoryMenuData::edit_btn($cat->id) . " " . CategoryMenuData::del_btn($cat->id); ?>
                                    </p>
                                    <?php
                                    CategoryMenuData::list_tree_cat_id($cat->id); ?>
                                <?php endforeach; ?>

                                </li>
                        </ul>
                    <?php else : ?>
                        <p class="alert alert-danger">There are no categories</p>
                    <?php endif; ?>

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