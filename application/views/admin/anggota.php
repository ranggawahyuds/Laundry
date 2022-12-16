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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col" nowrap>Member Sejak</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($member as $a) { ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['name']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= date('d F Y', $a['date_created']); ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/profile/') . $a['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:40px;height:35px;">
                                </picture>
                            </td>
                            <td>
                                <a href="<?= base_url('user/hapusUser/').$a['id'];?>" onclick="return confirm('Kamu yakin akan menghapus ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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

