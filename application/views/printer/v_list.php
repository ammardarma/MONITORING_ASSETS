<a href="<?=base_url()?>PC" class="btn btn-danger mb-4"><i class="fa fa-arrow-left"></i> Back</a>
<div class="d-flex justify-content-between">
    <h5 class="fw-bold"><i class="fa fa-print"></i> Printer</h5>
</div>
<!-- ALERT MESSAGE -->
<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" data-mdb-alert-init
        data-mdb-color="success">
        <i class="fa fa-check-circle me-3"></i>
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('failed')) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" data-mdb-alert-init
        data-mdb-color="danger">
        <i class="fa fa-check-circle me-3"></i>
        <?php echo $this->session->flashdata('failed'); ?>
        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<?php $this->session->unset_userdata('success'); ?>
<?php $this->session->unset_userdata('failed'); ?>

<div class="row mt-4 justify-content-start">
    <div class="col-md-3 mb-2">
        <input type="hidden" class="tipe" value="<?=$tipe?>"/>
        <select data-mdb-select-init class="tahun">
            <?php for($i = 0; $i < 10; $i++): ?>
                <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
            <?php endfor; ?>
        </select>
        <label class="form-label select-label">Filter Year</label>
    </div>
    <div class="col-md-3 mb-2">
        <select data-mdb-select-init class="periode">
            <option value="" selected>All</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <label class="form-label select-label">Filter Month</label>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-10">
                    <div class="form-outline" data-mdb-input-init>
                        <i class="fas fa-search trailing"></i>
                        <input type="text" class="form-control" id="search-dt-table" />
                        <label class="form-label" for="datatable-search-input">Search</label>
                    </div> 
                </div>
                <div class="col-md-2 text-end">
                    <?php if($this->session->userdata('status') != 'admin'): ?>
                        <a href="<?=base_url()?>Printer/viewForm?tipe=<?=$tipe?>" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;&nbsp;Add Data</a>
                    <?php endif; ?>
                </div>
            </div>
            <table id="dt_table" class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>Nama Perangkat</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Tipe</th>
                        <th>Pencapaian</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- MODAL UNTUK DELETE DATA PELATIHAN DAN LEMBAGA (URL DARI CONTROLLER) -->
<form id='formDeleteData' method="post" action="">
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:900; font-size:20px;"><span class="fa fa-warning text-danger"></span> Hapus Data</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function() {
    $('.tahun').on('change', function () {
        oTable.DataTable().draw();
    });

    $('.periode').on('change', function () {
        oTable.DataTable().draw();
    });

    oTable = $('#dt_table').dataTable({
        dom: 'Brtip',
        order: [],
        processing: true,
        responsive:true,
        searching:true,
        serverSide:true,
        serverMethod:'post',
        scrollX: true,
        language: { 
            paginate: {
                previous: "<i class='fa fa-angle-left'>",
                next: "<i class='fa fa-angle-right'>"
            }
        },
        ajax: {
            url: "<?= base_url() ?>Printer/ajaxDataPrinter",
            "type": "POST",
            "data": function (data) {
                data['tipe'] = $('.tipe').val();
                data['tahun'] = $('.tahun').val();
                data['periode'] = $('.periode').val();
            },

        },
        columnDefs: [
            {
                "width": "20%",
                "targets": 0,
                "orderable": true,
            }, 
            {
                "targets": 5,
                "orderable": false,
                "className" : 'dt-center',
            },                     
        ],      
    });

    $('#search-dt-table').on('input', function() {
        oTable.DataTable().search($(this).val()).draw() ;
    });

  });

  function deleteData(url){
    // console.log(url.replace('_', ' '));return false;
    $('#formDeleteData').attr('action', '<?=base_url()?>Printer/'+url.replace('_', ' '));
    new mdb.Modal($('#modalDelete')).show();
  }

  
</script>