<div class="d-flex justify-content-between">
    <h5 class="fw-bold"><i class="fa fa-bullseye-arrow"></i> &nbsp;&nbsp;Target</h5>
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

<div class="row mt-2 justify-content-end">
    <div class="col-md-3 mb-2">
        <select data-mdb-select-init class="tahun">
            <?php for($i = 0; $i < 10; $i++): ?>
                <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
            <?php endfor; ?>
        </select>
        <label class="form-label select-label">Filter Year</label>
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
                    <a href="<?=base_url()?>Target/viewForm?" class="btn btn-success" ><i class="fa fa-plus"></i> &nbsp;&nbsp;Add Data</a>
                </div>
            </div>
            <table id="dt_table" class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Periode</th>
                        <th>Tipe</th>
                        <th>Target</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- MODAL UNTUK DELETE DATA (URL DARI CONTROLLER) -->
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
            url: "<?= base_url() ?>Target/ajaxDataTarget",
            "type": "POST",
            "data": function (data) {
                data['tahun'] = $('.tahun').val()
            },

        },
        columnDefs: [
            {
                "width": "20%",
                "targets": 0,
                "orderable": true,
            }, 
            {
                "targets": 3,
                "orderable": false,
                "className" : 'dt-center',
            },                     
        ],      
    });

    $('#search-dt-table').on('input', function() {
        oTable.DataTable().search($(this).val()).draw() ;
    });

    $('.tahun').on('change', function () {
        oTable.DataTable().draw();
    });

  });

  function deleteData(url){
    $('#formDeleteData').attr('action', '<?=base_url()?>Users/'+url);
    new mdb.Modal($('#modalDelete')).show();
  }

  
</script>