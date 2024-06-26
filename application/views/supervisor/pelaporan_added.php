<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>

            </h2>
        </div>
        <!-- jQuery UI CSS -->
        <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- Basic Examples -->
        <?= $this->session->flashdata('message'); ?>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADDED
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Tiket</th>
                                        <th>Tanggal</th>
                                        <th>Nama Klien</th>
                                        <th>Perihal</th>
                                        <th>Attachment</th>
                                        <th>Category</th>
                                        <th>Priority</th>
                                        <th>Max Day</th>
                                        <th>Status CCS</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>No Tiket</th>
                                        <th>Tanggal</th>
                                        <th>Nama Klien</th>
                                        <th>Perihal</th>
                                        <th>Attachment</th>
                                        <th>Category</th>
                                        <th>Priority</th>
                                        <th>Max Day</th>
                                        <th>Status CCS</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($dataAdded as $dp): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <!-- <td><a
                                                href="<?= base_url() ?>admin/ruangan_isi/<?= $rgn['id_ruangan']; ?>"><?= $rgn['kode_bangunan']; ?>.<?= $rgn['kode_ruangan']; ?>'</a>
                                            </td> -->
                                            <!-- <td> <a
                                                href="<?= base_url('supervisor/pilih_helpdesk/' . $dp['id']); ?>"><?= $dp['no_tiket']; ?></a>
                                            </td> -->
                                            <td><?= $dp['no_tiket']; ?></td>
                                            <td><?= tanggal_indo($dp['waktu_pelaporan']) ?></td>
                                            <td><?= $dp['nama']; ?></td>
                                            <td><?= $dp['perihal']; ?></td>
                                            <td> <a
                                                    href="<?= base_url('assets/files/' . $dp['file']); ?>"><?= $dp['file']; ?></a>
                                            </td>
                                            <td><?= $dp['kategori']; ?></td>
                                            <td>
                                                <?php if ($dp['priority'] == 'Low'): ?>
                                                    <span class="label label-info">Low</span>

                                                <?php elseif ($dp['priority'] == 'Medium'): ?>
                                                    <span class="label label-warning">Medium</span>

                                                <?php elseif ($dp['priority'] == 'High'): ?>
                                                    <span class="label label-danger">High</span>


                                                <?php else: ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($dp['maxday'] == '90'): ?>
                                                    <span class="label label-info">90</span>

                                                <?php elseif ($dp['maxday'] == '60'): ?>
                                                    <span class="label label-warning">60</span>

                                                <?php elseif ($dp['maxday'] == '7'): ?>
                                                    <span class="label label-danger">7</span>


                                                <?php else: ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($dp['status_ccs'] == 'FINISH'): ?>
                                                    <span class="label label-success">FINISH</span>

                                                <?php elseif ($dp['status_ccs'] == 'CLOSE'): ?>
                                                    <span class="label label-warning">CLOSE</span>

                                                <?php elseif ($dp['status_ccs'] == 'HANDLE'): ?>
                                                    <span class="label label-info">HANDLE</span>

                                                <?php elseif ($dp['status_ccs'] == 'ADDED'): ?>
                                                    <span class="label label-primary">ADDED</span>

                                                <?php else: ?>

                                                <?php endif; ?>

                                            </td>
                                            <td><?= $dp['status']; ?></td>


                                            <td>
                                                <!-- <div class="btn btn-sm btn-warning">
                                                <div class="demo-google-material-icon" data-toggle="modal"
                                                    data-target="#editModal<?= $dp['id']; ?>"><i
                                                        class="material-icons">edit</i> <span
                                                        class="icon-name">Edit</span>
                                                </div>
                                            </div> -->

                                                <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                                <div class="btn btn-sm btn-warning">
                                                    <a href="javascript:;" data-id="<?= $dp['id']; ?>"
                                                        data-no_tiket="<?= $dp['no_tiket']; ?>"
                                                        data-waktu_pelaporan="<?= $dp['waktu_pelaporan']; ?>"
                                                        data-nama="<?= $dp['nama']; ?>"
                                                        data-perihal="<?= $dp['perihal']; ?>"
                                                        data-status="<?= $dp['status']; ?>"
                                                        data-status_ccs="<?= $dp['status_ccs']; ?>"
                                                        data-kategory="<?= $dp['kategori']; ?>"
                                                        data-priority="<?= $dp['priority']; ?>"
                                                        data-maxday="<?= $dp['maxday']; ?>" data-toggle="modal"
                                                        data-target="#editModalCP"> <i class="material-icons">edit</i> <span
                                                            class="icon-name">Edit</span></a>

                                                </div>

                                                <!-- <a class="btn btn-sm btn-info"
                                                href="<?= base_url() ?>supervisor/updateccs/<?= $dp['id']; ?>"><i
                                                    class="material-icons"></i> <span class="icon-name"></span>
                                                edit</a> -->

                                                <br>
                                                <br>

                                                <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                                <a class="btn btn-sm btn-info tombol-usulkan"
                                                    href="<?= base_url() ?>supervisor/forwardtoHD/<?= $dp['id']; ?>"><i
                                                        class="material-icons">forward</i> <span class="icon-name"></span>
                                                    Forward 1</a>
                                                <br>
                                                <br>

                                                <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                                <a class="btn btn-sm btn-info tombol-usulkan"
                                                    href="<?= base_url() ?>supervisor/forwardtoHD2/<?= $dp['id']; ?>"><i
                                                        class="material-icons">forward</i> <span class="icon-name"></span>
                                                    Forward 2</a>
                                                <br>
                                                <br>
                                                <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                                <a class="btn btn-sm btn-info tombol-usulkan"
                                                    href="<?= base_url() ?>supervisor/forwardtoHD3/<?= $dp['id']; ?>"><i
                                                        class="material-icons">forward</i> <span class="icon-name"></span>
                                                    Forward 3</a>

                                                <br>
                                                <br>
                                                <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                                <a class="btn btn-sm btn-info tombol-usulkan"
                                                    href="<?= base_url() ?>supervisor/forwardtoHD4/<?= $dp['id']; ?>"><i
                                                        class="material-icons">forward</i> <span class="icon-name"></span>
                                                    Forward 4</a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
    <!-- Button trigger modal -->
</section>


<!-- MODAL EDIT -->

<div class="modal fade" id="editModalCP" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Edit Priority and Category</h4>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('supervisor/edit_pelaporan') ?>
                <input type="hidden" name="id" id="id" value="">
                <div class="body">
                    <form class="form-horizontal">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="no_tiket" name="no_tiket" class="form-control" readonly>
                                <label class="form-label">No tiket</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="waktu_pelaporan" name="waktu_pelaporan"
                                    class="form-control" readonly>
                                <label class="form-label">Waktu Pelaporan</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="nama" name="nama" class="form-control" readonly>
                                <label class="form-label">Nama Klien</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="perihal" name="perihal" class="form-control" readonly>
                                <label class="form-label">Perihal</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="status" name="status" class="form-control" readonly>
                                <label class="form-label">Status</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="status_ccs" name="status_ccs" class="form-control"
                                    readonly>
                                <label class="form-label">Status CCS</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <select id="priority" name="priority" class="form-control">
                                <option value="">-- Please select Priority--</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" id="maxday" name="maxday" class="form-control">
                                <label class="form-label">Max day</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <select name="kategori" id="kategori" class="form-control">

                                <option value="<?= $dp['kategori']; ?> "><?= $dp['kategori']; ?></option>
                                <?php
                                foreach ($category as $cat): ?>
                                    <option value="<?php echo $cat['nama_kategori']; ?>">
                                        <?php echo $cat['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE
                                CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>

                        </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>



<!-- modal cari kategori -->
<div class="modal fade" id="defaultModalNamaKategori" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Cari Kategori</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th class="hide">ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($category as $cat): ?>
                            <tr>
                                <td style="text-align:center;" scope="row">
                                    <?= $i; ?>
                                </td>
                                <td><?= $cat['nama_kategori']; ?></td>
                                <td class="hide"><?= $cat['id']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih3"
                                        data-nama-kategori="<?= $cat['nama_kategori']; ?>"
                                        data-id-namakategori="<?= $cat['id']; ?>">
                                        Pilih</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AUTO INPUT MAX DAY AFTER SELECT PRIORITY -->

<script type="text/javascript">
    //Get references to the select and input elements
    const select = document.getElementById('priority');
    const input = document.getElementById('maxday');

    // Add event listener to the select element
    select.addEventListener('change', function () {
        // Set the value of the input field to the selected option's value
        if (select.value == "Low") {
            input.value = "90";
        } else if (select.value == "Medium") {
            input.value = "60";
        } else if (select.value == "High") {
            input.value = "7";
        } else {
            input.value = "";

        }

    });
</script>



<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#pilih3', function () {
            var nama_klas = $(this).data('nama-kategori');
            var id = $(this).data('id-namakategori');
            $('#kategori').val(nama_klas);
            $('#id').val(id);
            $('#defaultModalNamaKategori').modal('hide');
        })
    });
</script>
<script>
    $(document).ready(function () {

        // Untuk sunting
        $('#editModalCP').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#no_tiket').attr("value", div.data('no_tiket'));
            modal.find('#waktu_pelaporan').attr("value", div.data('waktu_pelaporan'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#perihal').attr("value", div.data('perihal'));
            modal.find('#status').attr("value", div.data('status'));
            modal.find('#status_ccs').attr("value", div.data('status_ccs'));
            // modal.find('#priority').attr("value", div.data('priority'));
            modal.find('#priority').value = div.data('priority');
            // modal.find('#priority option:selected').text(div.data('priority'));
            modal.find('#maxday').attr("value", div.data('maxday'));
            // modal.find('#kategori').attr("value", div.data('kategori'));
            modal.find('#kategori option:selected').text(div.data('kategori'));
            // modal.find('#bprnama').attr("value", div.data('bprnama'));
            // modal.find('#bprsandi').attr("value", div.data('bprsandi'));
            // modal.find('#judul').attr("value", div.data('judul'));
            // modal.find('#headline').attr("value", div.data('headline'));
            // modal.find('#gbr_utama').attr("src", '<?= base_url() ?>assets/images/berita/' + div.data('gbr_utama'));
            // modal.find('#gbrtmbhn1').attr("src", '<?= base_url() ?>assets/images/berita/' + div.data('gbrtmbhn1'));
            // modal.find('#gbrtmbhn2').attr("src", '<?= base_url() ?>assets/images/berita/' + div.data('gbrtmbhn2'));
            // modal.find('#gbrtmbhn3').attr("src", '<?= base_url() ?>assets/images/berita/' + div.data('gbrtmbhn3'));
            // modal.find('#linkberita').val(div.data('linkberita'));
            // modal.find('#kategori option:selected').text(div.data('kategori'));

        });

    });
</script>
