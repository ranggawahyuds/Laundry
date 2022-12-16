<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bukuBaruModal">
                <i class="fas fa-file-alt"></i> Add Order</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">ID Order</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Laundry</th>
                        <th scope="col">Total Order</th>
                        <th scope="col">Tanggal Order</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Status Order</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $a = 1;
                    foreach ($order as $b) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $b['id_order']; ?></td>
                            <td><?= $b['email']; ?></td>
                            <td><?= $b['jenis']; ?></td>
                            <td><?= $b['total_order']; ?></td>
                            <td><?= $b['tgl_order']; ?></td>
                            <td><?= $b['tgl_selesai']; ?></td>
                            <td><div style="text-transform: uppercase"><?= $b['status_order']; ?><td>
                            <td>
                                <a href="<?= base_url('order/ubahOrder/').$b['id_order'];?>" 
                                class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('order/hapusOrder/').$b['id_order'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $title.' '.$b['id_order'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah buku baru-->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('order'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="id_order" 
                        value="<?= date('Ydm'); ?><?= mt_rand(10, 99); ?>" readonly
                        name="id_order" placeholder="ID Order">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" 
                        name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jenis" 
                        name="jenis" placeholder="Jenis Laundry">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="total_order" 
                        name="total_order" placeholder="Total Order">
                    </div>
                    <div class="mb-3">
                        <label class="ml-3">Tanggal Order</label>
                            <input type ="date" name="tgl_order" id="tgl_order" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="ml-3">Tanggal Selesai</label>
                            <input type ="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" name="status_order" id="status_order" disabled>
                            <option value="proses">Proses</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- End of Modal Tambah Mneu -->