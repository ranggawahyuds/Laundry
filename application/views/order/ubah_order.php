<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('message'); ?>
            <?php foreach ($order as $b) { ?>
                <form action="<?= base_url('order/ubahOrder'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_order" id="id_order" value="<?php echo $b['id_order']; ?>">
                        <input type="text" class="form-control form-control-user" id="judul_buku" name="id_order" 
                        placeholder="-" value="<?= $b['id_order']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" 
                        placeholder="Masukkan Email" value="<?= $b['email']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jenis" name="jenis" 
                        placeholder="Masukkan Jenis Laundry" value="<?= $b['jenis']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="total_prder" name="total_order" 
                        placeholder="Masukkan Total Order" value="<?= $b['total_order']; ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" name="status_order" id="status_order">
                            <option value="">--->Status Order<---</option>
                            <option value="selesai">Selesai</option>
                            <option value="proses">Proses</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" 
                        value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" 
                        value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>