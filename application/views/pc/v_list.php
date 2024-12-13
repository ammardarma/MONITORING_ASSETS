<div><h5 class="fw-bold"><i class="fa fa-desktop"></i> Personal Computer</h5></div>

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
            <option value="1">2</option>
        </select>
        <label class="form-label select-label">Filter Period</label>
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
                    <button type="button" class="btn btn-success" href="<?=base_url()?>PC" ><i class="fa fa-plus"></i> &nbsp;&nbsp;Add Data</button>
                </div>
            </div>
            <table id="dt_table" class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>Nama User</th>
                        <th>Nama Perangkat</th>
                        <th>Tahun</th>
                        <th>Periode</th>
                        <th>Tipe</th>
                        <th>Pencapaian</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

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
            url: "<?= base_url() ?>PC/ajaxDataPC",
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
                "targets": 6,
                "orderable": false,
                "className" : 'dt-center',
            },                     
        ],      
    });

    $('#search-dt-table').on('input', function() {
        oTable.DataTable().search($(this).val()).draw() ;
    });
  });
</script>