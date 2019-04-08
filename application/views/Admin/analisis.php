<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Analisis Data Survey</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTable Distance dan Preferensi</h6>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="datav" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Lokasi</th>
                        <th>D<sup>+</sup></th>
                        <th>D<sup>-</sup></th>
                        <th>V</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($data as $q) : ?>
                        <tr>
                            <th><?= $no ?></th>
                            <th><?= $q->id ?></th>
                            <th><?= $q->lokasi ?></th>
                            <th><?= number_format($data_d[0][$no], 4, '.', ',') ?></th>
                            <th><?= number_format($data_d[1][$no++], 4, '.', ',') ?></th>
                            <th><?= number_format($data_v[$q->lokasi], 4, '.', ',') ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Lokasi</th>
                        <th>D<sup>+</sup></th>
                        <th>D<sup>-</sup></th>
                        <th>V</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTable Solusi Ideal Positif dan Negatif <h6>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="datas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Id</th>
                        <th>Lokasi</th>
                        <th>Harga Tanah</th>
                        <th>Jarak Gudang</th>
                        <th>Persaingan</th>
                        <th>Investasi</th>
                        <th>Jumlah Peternak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($data_solusi as $s) : ?>
                        <tr>
                            <th><?php ($no > 0) ? $a = 'A<sup>-</sup>' : $a = 'A<sup>+</sup >';
                                echo $a ?> </th>
                            <th> <?= $data[$no]->id ?></th>
                            <th><?= $data[$no++]->lokasi ?></th>
                            <th><?= number_format($s[0], 4, '.', ',') ?></th>
                            <th><?= number_format($s[1], 4, '.', ',') ?></th>
                            <th><?= number_format($s[2], 4, '.', ',') ?></th>
                            <th><?= number_format($s[3], 4, '.', ',') ?></th>
                            <th><?= number_format($s[4], 4, '.', ',') ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Type</th>
                        <th>Id</th>
                        <th>Lokasi</th>
                        <th>Harga Tanah</th>
                        <th>Jarak Gudang</th>
                        <th>Persaingan</th>
                        <th>Investasi</th>
                        <th>Jumlah Peternak</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTable Normalisasi Alternatif Terbobot</h6>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="datar" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Lokasi</th>
                        <th>Harga Tanah</th>
                        <th>Jarak Gudang</th>
                        <th>Persaingan</th>
                        <th>Investasi</th>
                        <th>Jumlah Peternak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($data_y as $y) : ?>
                        <tr>
                            <th><?= $no ?></th>
                            <th><?= $data[$no]->id ?></th>
                            <th><?= $data[$no++]->lokasi ?></th>
                            <th><?= number_format($y[0], 4, '.', ',') ?></th>
                            <th><?= number_format($y[1], 4, '.', ',') ?></th>
                            <th><?= number_format($y[2], 4, '.', ',') ?></th>
                            <th><?= number_format($y[3], 4, '.', ',') ?></th>
                            <th><?= number_format($y[4], 4, '.', ',') ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Lokasi</th>
                        <th>Harga Tanah</th>
                        <th>Jarak Gudang</th>
                        <th>Persaingan</th>
                        <th>Investasi</th>
                        <th>Jumlah Peternak</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->