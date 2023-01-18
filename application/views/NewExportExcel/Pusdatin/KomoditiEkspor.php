
    <?php 
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=10 Komoditi Ekspor Utama Jawa Timur - {$datanegara}.xls");
    ?>
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="komoeks" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">10 KOMODITI EKSPOR UTAMA JAWA TIMUR - <?= $datanegara ?><label id="lblBlNegara6"  style="color: red;font-size: 36px;text-transform: uppercase;"></label> <br>Tahun <?=date('Y')?></h2>

                                    <p style="text-align:right">Nilai : US$</p>
                                    <p>Data berdasarkan pusdatin</p>
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th>HS</th>
                                            <th>URAIAN HS 2</th>
                                            <th>BERAT(KGM)</th>
                                            <th>NILAI(USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!isset($datatable)) { ?>
                                            <tr>
                                                <td colspan="5" style="text-align:center;">Data Tidak Tersedia</td>
                                            </tr>
                                        <?php } else {
                                            foreach ($datatable as $key) { ?>
                                                <tr style="text-align:center;">
                                                    <td><?= $key['hs'] ?></td>
                                                    <td><?= $key['uraian'] ?></td>
                                                    <td><?= $key['berat'] ?></td>
                                                    <td><?= $key['nilai'] ?></td>
                                                </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                                <label style="color:red">* Periode Tahun <?= $tahun->tahun?> <?= date('F', strtotime("early month"));?> - <?=$tahun->bln_akhir?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>