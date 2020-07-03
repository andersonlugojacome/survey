



<!--This page plugins -->
<script src="/themes/spanishasap/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/themes/spanishasap/dist/js/pages/datatable/custom-datatable.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">System users <i class="ti-user"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">System users</li>
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
                    <h6 class="card-subtitle">System users</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="./?view=newuser" class="btn btn-primary">
                                <i class="ti-user"></i> New user</a>
                        </div>
                    </div>
                    <hr />

                    <?php
                    $result = UserData::find_all_user();
                    if (count($result) > 0) {
                    ?>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Full name</th>
                                    <th>Rol</th>
                                    <th>Email</th>
                                    <th>Nick</th>
                                    <th>Status</th>
                                    <th>Last login</th>
                                    <th class="disabled-sorting text-right">Options</th>
                                </thead>
                                <?php foreach ($result as $user) : ?>
                                    <tr>
                                        <td>
                                            <?= $user->name . " " . $user->lastname; ?>
                                        </td>
                                        <td>
                                            <?= $user->group_name; ?>
                                        </td>
                                        <td>
                                            <?= $user->email; ?>
                                        </td>
                                        <td>
                                            <?= $user->username; ?>
                                        </td>
                                        <td>
                                            <?php if ($user->is_active) : ?>
                                                <i class="ti-check"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= $user->last_login; ?>

                                        </td>
                                        <td class="text-right">
                                            <a href="./?view=edituser&id=<?= $user->id; ?>" class="btn btn-link btn-warning btn-just-icon edit"><i class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach; ?>
                            </table>
                        </div>
                    <?php
                    } else {
                        echo "<p class='alert alert-danger'>No created users.</p>";
                    }
                    ?>





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





















<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            dom: 'lBfrtip',
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],
            language: {
                buttons: {
                    print: 'Print'
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            }

        });
        var table = $('#datatables').DataTable();
        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            //alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });
        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });
        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });
        $('.card .material-datatables label').addClass('form-group');
    });
</script>