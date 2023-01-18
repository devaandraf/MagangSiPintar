<?php 
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Perkembangan Impor Non Migas Jawa Timur BPS - {$datanegara}.xls");
    ?>
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="impor" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">Perkembangan Impor Non Migas Jawa Timur - <?= $datanegara ?><label id="lblBlNegara4"  style="color: red;font-size: 36px;text-transform: uppercase;"></label> </h2>

                                    <p style="text-align:right">Nilai : US$</p>
                                    <p>Data berdasarkan pusdatin</p>
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th>TAHUN</th>
                                            <th>TOTAL IMP JATIM</th>
                                            <th>IMP DARI <label id="lblBlNegara5" style="color: red;font-size: 15px;text-transform: uppercase;"></label></th>
                                            <th>PERTUMB(%)</th>
                                            <th>SHARE(%)</th>
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
                                            <td><?= $key['tahun'] ?></td>
                                            <td><?= $key['nilai'] ?></td>
                                            <td><?= $key['nilaiI'] ?></td>
                                            <td><?= $key['pertumbuhan'] ?></td>
                                            <td><?= $key['share'] ?></td>
                                        </tr>
                                <?php } } ?>

                                    </tbody>
                                </table>
                                <!-- <label style="color:red">* Periode Tahun <?= $lastmonthI->tahun?> <?= date('F', strtotime("early month"));?> - <?=$lastmonthI->bln_akhir?></label> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>