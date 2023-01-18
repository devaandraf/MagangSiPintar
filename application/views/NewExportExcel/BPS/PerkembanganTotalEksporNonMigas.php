<?php 
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Perkembangan Total Ekspor Non Migas Jawa Timur BPS-{$datanegara}.xls");
    ?>
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="ekspor" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">Perkembangan Total Ekspor Non Migas Jawa Timur - <?= $datanegara ?><label id="lblBlNegara2"  style="color: red;font-size: 36px;text-transform: uppercase;"></label> </h2>

                                    <p style="text-align:right">Nilai : US$</p>
                                    <p>Data berdasarkan pusdatin</p>
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th>TAHUN</th>
                                            <th>TOTAL EKS JATIM</th>
                                            <th>EKS KE <label id="lblBlNegara3" style="color: red;font-size: 15px;text-transform: uppercase;"></label> </th>
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
                                                    <td><?= $key['nilaiE'] ?></td>
                                                    <td><?= $key['pertumbuhan'] ?></td>
                                                    <td><?= $key['share'] ?></td>
                                                </tr>
                                        <?php } } ?>

                                    </tbody>
                                </table>
                                <!-- <label style="color:red">* Periode Tahun <?= $lastmonth->tahun?> <?= date('F', strtotime("early month"));?> - <?=$lastmonth->bln_akhir?></label> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>