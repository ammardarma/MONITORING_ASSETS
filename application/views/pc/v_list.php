<div><h5 class="fw-bold"><i class="fa fa-desktop"></i> Personal Computer</h5></div>
<div class="text-secondary fw-bold text-end" style="font-size:0.8rem;">
    <i class="fa fa-angle-double-right"></i> PC <i class="fa fa-angle-right"></i> List data
</div>

<div class="row mt-4 mb-4 justify-content-end">
    <div class="col-md-3">
        <select data-mdb-select-init class="tahun">
            <?php for($i = 0; $i < 10; $i++): ?>
                <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
            <?php endfor; ?>
        </select>
        <label class="form-label select-label">Filter Year</label>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  });
</script>