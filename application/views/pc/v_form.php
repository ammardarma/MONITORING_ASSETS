<div><h5 class="fw-bold"><i class="fa fa-desktop"></i> Personal Computer</h5></div>

<?php if(!empty($data)): ?>
    <form id='formEditData' method="post" action="<?= base_url() ?>PC/actEditData" class="was-validated">
<?php else: ?>
    <form id='formAddData' method="post" action="<?= base_url() ?>PC/actAddData" class="was-validated">
<?php endif; ?>
<div class="card mt-4">
    <div class="card-body">
        <div class="row text-start">
            <h6 class="card-title fw-bold"><i class="fa fa-pen"></i> &nbsp;<?=$title?></h6>  
        </div>
        <hr class="hr hr-blurry mb-4"/>
        <input type="hidden" name="id" value="<?=!empty($data) ? $data->ID : ''?>"/>
        <div class="col-md-12 mb-4">
            <select data-mdb-select-init class="tipe" name="tipe">
                <option value="AR" <?=!empty($data) && $data->TIPE == 'AR' ? 'selected' : ''?>>Availability Rate</option>
                <option value="KM" <?=!empty($data) && $data->TIPE == 'KM' ? 'selected' : ''?>>Maintenance Success</option>
                <option value="MTBF" <?=!empty($data) && $data->TIPE == 'MTBF' ? 'selected' : ''?>>Mean Time Between Failures</option>
            </select>
            <label class="form-label select-label">Tipe</label>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama_perangkat" style="width:100%" value="<?=!empty($data) ? $data->NAMA_PERANGKAT : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama Perangkat</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama_user" style="width:100%" value="<?=!empty($data) ? $data->NAMA_USER : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama User</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="date" class="form-control" name="tanggal" style="width:100%" value="<?=!empty($data) ? date('Y-m-d', strtotime($data->TANGGAL)) : '' ?>" required/>
                <label for="nama_lembaga" class="form-label">Tanggal</label>
            </div>
        </div>
        <div class="col-md-12 mb-4 colPencapaian">
            <div class="form-outline" data-mdb-input-init>
                <input type="number" class="form-control" name="pencapaian" value="<?=!empty($data) ? ($tipe != 'MTBF' ? $data->PENCAPAIAN * 100 : $data->PENCAPAIAN) : ''?>" style="width:100%" required/>
                <label for="" class="form-label">Pencapaian</label>
            </div>
        </div>
        <!-- <div class="col-md-12 mb-4 colKendala" hidden>
            <select name="kendala[]" data-mdb-select-init class="kendala" multiple required>
                <option value="1">Update</option>
                <option value="2">Internet</option>
                <option value="3">Antivirus</option>
                <option value="3">Office</option>
                <option value="4">Server</option>
                <option value="5">Hardware</option>
                <option value="5">Driver</option>
            </select>
            <label class="form-label select-label">Kendala</label>
        </div> -->
    </div>
    <div class="card-footer">
        <a href="<?=base_url()?>PC/viewList?tipe=<?=$tipe?>" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
//    $('.tipe').on('change', function () {
//     <?php if(empty($data)): ?>
//         if($(this).val() == 'AR'){
//             $('.colKendala').attr('hidden', false);
//             $('.colPencapaian').attr('hidden', true);
//         }else {
//             $('.colPencapaian').attr('hidden', false);
//             $('.colKendala').attr('hidden', true);
//         }
//     <?php endif; ?>
//    });

});
</script>