<?= $this->extend('layout/layoutHome') ?>

<?= $this->section('content') ?>

<br>

<!-- session alert -->
<?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success"><i class="fas fa-circle-info"></i> <?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModalProduk"><i class="fas fa-add"></i> Tambah Barang</button>
            <div class="float-right">
                <form action="">
                    <input type="input" class="form-control" name="keyword" placeholder="Search" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>">
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">SKU Barang</th>
                        <th scope="col">Deskripsi Barang</th>
                        <th scope="col">Merek Barang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($datap) > 0) : ?>
                        <?php $no = 1;
                        foreach ($datap as $key => $value) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->namap ?></td>
                                <td><?= $value->skup ?></td>
                                <td><?= $value->desp ?></td>
                                <td><?= $value->merekp ?></td>
                                <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModalProduk<?= $value->idp ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModalProduk<?= $value->idp ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" align="center">Produk <strong><?= $_GET['keyword'] ?></strong> tidak ditemukan.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?= $pager->links('data', 'pager') ?>
        </div>
    </div>
</div>

<!-- Modal tambah produk -->
<div class="modal fade" id="tambahModalProduk" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="namap">
                    </div>
                    <div class="form-group">
                        <label>SKU Barang</label>
                        <input type="text" class="form-control" name="skup">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Barang</label>
                        <input type="text" class="form-control" name="desp">
                    </div>
                    <div class="form-group">
                        <label>Merek Barang</label>
                        <input type="text" class="form-control" name="merekp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal hapus produk -->
<?php foreach ($datap as $key => $value) : ?>
    <div class="modal fade" id="hapusModalProduk<?= $value->idp ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus produk <?= $value->namap ?>.
                </div>
                <form action="/<?= $value->idp ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal edit produk -->
<?php foreach ($datap as $key => $value) : ?>
    <div class="modal fade" id="editModalProduk<?= $value->idp ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk <strong><?= $value->namap ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/<?= $value->idp ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="namap">
                        </div>
                        <div class="form-group">
                            <label>SKU Barang</label>
                            <input type="text" class="form-control" name="skup">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Barang</label>
                            <input type="text" class="form-control" name="desp">
                        </div>
                        <div class="form-group">
                            <label>Merek Barang</label>
                            <input type="text" class="form-control" name="merekp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection('content') ?>