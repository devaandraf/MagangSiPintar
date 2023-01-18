<!DOCTYPE html>
<html lang="zxx" class="no-js">
     <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php $this->load->view('template/css') ?>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"/>
   <link href="<?= base_url() ?>assets/vendor/select-search/select-search.min.css" rel="stylesheet">
   <style>
       .select2-container {
            padding-top: 23px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 72px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 46px;
}
   </style>
    </head>
    <body>
       <?php
            if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] == "") {
                $this->load->view('template/header');
            } elseif ($this->session->userdata['user_role'] == "ADMIN") {
                $this->load->view('template/header_admin');
            } elseif($this->session->userdata['user_role'] == "USER"){
                $this->load->view('template/header_user');
            }
            else {
                $this->load->view('template/header');
            }
            ?>
        <!-- start banner Area -->
        <div class="bradcam_area">
                <div class="bradcam_shap">
                    <img src="<?= base_url() ?>seogo/img/ilstrator/bradcam_ils.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text text-center">
                                <h3>Master Data SKA, Pusdatin, BPS</h3>
                                <h5>Periode: <?= $date_set ?></h5>
                                <form class="form-area contact-form mt-5" action="<?= base_url() ?>index.php/Home_admin/filter_masterdataSKAPUSDATINBPS" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input name="bultah" id="txtTahun1" placeholder="Masukkan Bulan Tahun"   autocomplete="off"  class="common-input mb-20 form-control" required="" type="text" style="width:50%;margin:auto;" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="genric-btn primary" >Filter Berdasararkan Bulan Tahun</button>
                                        <?php if($btnStatus) : ?>
                                            <a href="<?= site_url("Home_admin/masterdataSKAPUSDATINBPS") ?>" class="genric-btn info" >Kembali ke Periode Saat Ini</a>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- End banner Area -->

        <!-- Start contact-page Area -->
        <div class="service_area minus_padding">
            <div class="container">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="ska" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA SKA</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>No SKA</th>
                                            <th>Penerbit</th>
                                            <th>Terdaftar</th>
                                            <th>Nama Eksportir</th>
                                            <th>Alamat Eksportir</th>
                                            <th>Kota</th>
                                            <th>Alamat Pabrik</th>
                                            <th>Nama Importir</th>
                                            <th>Barang</th>
                                            <th>No HS</th>
                                            <th>Negara Tujuan</th>
                                            <th>Pelabuhan</th>
                                            <th>No Invoice</th>
                                            <th>Moda</th>
                                            <th>Vessel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($ska as $key => $value){?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?= $value->jenis_form ?></td>
                                            <td><?= $value->no_ska ?></td>
                                            <td><?= $value->ipskapenerbit ?></td>
                                            <td><?= $value->ipskaterdaftar ?></td>
                                            <td><?= $value->nama_eksportir ?></td>
                                            <td><?= $value->alamat_eksportir ?></td>
                                            <td><?= $value->kabkota ?></td>
                                            <td><?= $value->alamatpabrik ?></td>
                                            <td><?= $value->nama_importir ?></td>
                                            <td><?= $value->uraian_barang ?></td>
                                            <td><?= $value->nohs ?></td>
                                            <td><?= $value->negara_tujuan ?></td>
                                            <td><?= $value->pel_bongkar ?></td>
                                            <td><?= $value->no_invoice ?></td>
                                            <td><?= $value->moda ?></td>
                                            <td><?= $value->vessel ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="service_area minus_padding mt-10">
            <div class="container">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="pusdatin" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA PUSDATIN</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Nama Propinsi</th>
                                            <th>Kode HS</th>
                                            <th>Deskripsi</th>
                                            <th>Deskripsi HS</th>
                                            <th>Negara</th>
                                            <th>Kode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j=1; foreach ($pusdatin as $key => $value){?>
                                        <tr>
                                            <td><?=$j++?></td>
                                            <td><?= $value->nama_propinsi ?></td>
                                            <td><?= $value->kode_hs ?></td>
                                            <td><?= $value->deskripsi ?></td>
                                            <td><?= $value->diskripsi_hs ?></td>
                                            <td><?= $value->negara ?></td>
                                            <td><?= $value->kd_ekspor_impor ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="service_area minus_padding mt-10">
            <div class="container">
                    <div class="col-lg-12">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <table id="bps-migas" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA BPS Migas & Non Migas</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Sektor</th>
                                            <th>Status</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $k=1; foreach ($bpsmigas as $key => $value){?>
                                        <tr>
                                            <td><?=$k++?></td>
                                            <td><?= $value->sektor ?></td>
                                            <td><?= $value->ekspor_impor ?></td>
                                            <td><?= $value->kategori ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="my-5">
                            <div class="au-card-inner">
                                <table id="bps-nasional" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA BPS Nasional</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Nasional</th>
                                            <th>Nilai</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $l=1; foreach ($bpsnasional as $key => $value){?>
                                        <tr>
                                            <td><?=$l++?></td>
                                            <td><?= $value->nasional ?></td>
                                            <td><?= $value->nilai ?></td>
                                            <td><?= $value->ekspor_impor ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="my-5">
                            <div class="au-card-inner">
                                <table id="bps-komoditi" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA BPS Komoditi</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Uraian</th>
                                            <th>Nilai</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $m=1; foreach ($bpskomoditi as $key => $value){?>
                                        <tr>
                                            <td><?=$m++?></td>
                                            <td><?= $value->uraian_hs ?></td>
                                            <td><?= $value->nilai ?></td>
                                            <td><?= $value->ekspor_impor ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="my-5">
                            <div class="au-card-inner">
                                <table id="bps-negara" class="table table-hover responsive nowrap" style="width:100%">
                                    <h2 style="text-align:center">DATA BPS Negara</h2>
                                    <thead>
                                        <tr style="background: #c3c3c3;">
                                            <th>No</th>
                                            <th>Negara</th>
                                            <th>Nilai</th>
                                            <th>Exim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=1; foreach ($bpsnegara as $key => $value){?>
                                        <tr>
                                            <td><?=$m++?></td>
                                            <td><?= $value->negara ?></td>
                                            <td><?= $value->nilai ?></td>
                                            <td><?= $value->exim ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End contact-page Area -->
        <!-- start footer Area -->
        <?php $this->load->view('template/footer') ?>
            <!-- End footer Area -->
<?php $this->load->view('template/js') ?>
        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <!--export datatable-->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        
        
        
        <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/select-search/select-search.js"></script>

        <script type="text/javascript">
            $("#txtTahun1").datepicker({
                format: "yyyy-mm",
                minViewMode: 1,
                // viewMode: "months", 
                // startView : "months"
                // minViewMode: "months",
                // maxViewMode: "months"
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#ska").DataTable({
                    aaSorting: [],
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });
                
                $("#pusdatin").DataTable({
                    aaSorting: [],
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });
                
                $("#bps-migas").DataTable({
                    aaSorting: [],
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });
                
                $("#bps-nasional").DataTable({
                    aaSorting: [],
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });
                
                $("#bps-komoditi").DataTable({
                    aaSorting: [],
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });
                
                $("#bps-negara").DataTable({
                    aaSorting: [],
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ]
                });
            });
        </script>
    </body>
</html>
