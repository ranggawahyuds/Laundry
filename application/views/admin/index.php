<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-gray-800 text-uppercase mb-1">Admin</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                <?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-3x text-gray-600"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-gray-800 text-uppercase mb-1">
                                Member</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                <?= $this->ModelUser->getUserWhere(['role_id' => 1])->num_rows(); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-600"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-gray-800 text-uppercase mb-1">Laundry</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                <?= $this->ModelOrder->getOrder('id_order')->num_rows(); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-clipboard fa-3x text-gray-600"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-gray-800 text-uppercase mb-1">Order Selesai</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">0
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-3x text-gray-600"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- row table-->
    <div class="row">
        <div class="table-responsive table-bordered col-lg ml-5 mr-5 px-5 mt-2">
            <div class="page-header">
                <div class="fa fa-database text-danger mt-2"> Data Order</div>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Order</th>
                            <th>Email</th>
                            <th>Jenis</th>
                            <th>Tanggl Order</th>
                            <th>Tanggal Selesai</th>
                            <th>Status Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($order as $b) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $b['id_order']; ?></td>
                                <td><?= $b['email']; ?></td>
                                <td><?= $b['jenis']; ?></td>
                                <td><?= $b['tgl_order']; ?></td>
                                <td><?= $b['tgl_selesai']; ?></td>
                                <td><?= $b['status_order']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- end of row table-->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->