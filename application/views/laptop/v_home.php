<div id="pdf">

  <div id="header" class="row d-flex justify-content-between align-items-center mb-5 d-none">
    <div class="col-md-2">
      <img src="<?=base_url()?>assets/logo-wb.png" class="rounded d-none d-md-block logo" height="50" alt="?" loading="lazy"/>
    </div>
    <div class="col-md-4 text-end">
      <h6 style="font-size:0.8em;">Print tanggal : <?=date('d F Y h:i:s')?></h6>
      <h6 class="fw-bold text-primary" style="font-size:14px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i><?=$this->session->userdata('name') . ' | ' .ucfirst($this->session->userdata('status'))?></h6>
    </div>
  </div>

<div class="mb-4"><h5 class="fw-bold"><i class="fa fa-laptop"></i> Laptop</h5></div>

    
<div class="row justify-content-between align-items-center mb-2">
    <div class="col-md-2 align-self-stretch mb-2">
        <div class="card shadow-5-strong rounded-8 wave wave-success total-users">
            <div class="card-body py-2">
                <div class="row">
                    <small style="font-size:1em;"class="text-secondary"><b>Total Users</b></small>
                </div>
                <div class="d-flex justify-content-between align-items-start mt-2">
                    <h2 class="text-dark fw-bold"><?=$dataUser[0]->USER_NB ?: '0'?></h2>
                    <div class="btn btn-floating btn-secondary"><b><i class="fa fa-user"></i></b></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 text-end">
      <button class="btn btn-primary mb-4 rounded-5" onclick="printPDF()">Print PDF</button>
      <select data-mdb-select-init class="tahun">
          <?php for($i = 2; $i < 10; $i++): ?>
              <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
          <?php endfor; ?>
      </select>
      <label class="form-label select-label">Filter Year</label>
    </div>
</div>

<div class="row mb-3">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div class="text-primary fw-bold" style="font-size:1.2em;">Availability Rate</div>
        <div class="text-primary fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
      </div>
      <div class="card-body text-center">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="chart-ar-p1" style="width: 100%; height: 120px; background-color:transparent;"></div> 
            <div class="text-secondary mb-2" style="font-size:12px;">Target : <?=$dataSelisih[0]->AR_TARGET_1?>%</div>
          </div>
          <div class="col-md-6 position-relative text-center mb-2">
            <div class="text-secondary mb-2" style="font-size:12px;">Period 1</div>
              <?php if(substr($dataSelisih[0]->SELISIH_AR_1, 0, 1) == '-'): ?>
                  <h6 class="text-danger fw-bold"><i class="fa fa-arrow-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_1,2) ?: '0'?>%</h6>
              <?php else : ?>
                  <h6 class="text-success fw-bold"><i class="fa fa-arrow-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_1,2) ?: '0'?>%</h6>
              <?php endif; ?>
          </div>
        </div>
        <hr class="hr hr-blurry"/>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="chart-ar-p2" style="width: 100%; height: 120px; background-color:transparent;"></div> 
            <div class="text-secondary mb-2" style="font-size:12px;">Target : <?=$dataSelisih[0]->AR_TARGET_2?>%</div>
          </div>
          <div class="col-md-6 position-relative text-center mb-2">
            <div class="text-secondary mb-2" style="font-size:12px;">Period 2</div>
              <?php if(substr($dataSelisih[0]->SELISIH_AR_2, 0, 1) == '-'): ?>
                  <h6 class="text-danger fw-bold"><i class="fa fa-arrow-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_2,2) ?: '0'?>%</h6>
              <?php else : ?>
                  <h6 class="text-success fw-bold"><i class="fa fa-arrow-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_2,2) ?: '0'?>%</h6>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <a class="text-center" href="<?=base_url()?>Laptop/viewComparation?tipe=AR">
            <h6 class="text-primary mb-0">Comparison Years</h6>
            <i class="fas fa-angle-down"></i>
        </a>
        <a class="text-center" href="<?=base_url()?>Laptop/viewList?tipe=AR">
            <h6 class="text-primary mb-0">See Detail</h6>
            <i class="fas fa-angle-down"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div class="text-primary fw-bold" style="font-size:1.2em;">Maintenance Success</div>
        <div class="text-primary fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
      </div>
      <div class="card-body text-center">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="chart-km-p1" style="width: 100%; height: 120px; background-color:transparent;"></div> 
            <div class="text-secondary mb-2" style="font-size:12px;">Target : <?=$dataSelisih[0]->KM_TARGET_1?>%</div>
          </div>
          <div class="col-md-6 position-relative text-center mb-2">
            <div class="text-secondary mb-2" style="font-size:12px;">Period 1</div>
              <?php if(substr($dataSelisih[0]->SELISIH_KM_1, 0, 1) == '-'): ?>
                  <h6 class="text-danger fw-bold"><i class="fa fa-arrow-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_1,2) ?: '0'?>%</h6>
              <?php else : ?>
                  <h6 class="text-success fw-bold"><i class="fa fa-arrow-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_1,2) ?: '0'?>%</h6>
              <?php endif; ?>
          </div>
        </div>
        <hr class="hr hr-blurry"/>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="chart-km-p2" style="width: 100%; height: 120px; background-color:transparent;"></div> 
            <div class="text-secondary mb-2" style="font-size:12px;">Target : <?=$dataSelisih[0]->KM_TARGET_2?>%</div>
          </div>
          <div class="col-md-6 position-relative text-center mb-2">
            <div class="text-secondary mb-2" style="font-size:12px;">Period 2</div>
              <?php if(substr($dataSelisih[0]->SELISIH_KM_2, 0, 1) == '-'): ?>
                  <h6 class="text-danger fw-bold"><i class="fa fa-arrow-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_2,2) ?: '0'?>%</h6>
              <?php else : ?>
                  <h6 class="text-success fw-bold"><i class="fa fa-arrow-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_2,2) ?: '0'?>%</h6>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <a class="text-center" href="<?=base_url()?>Laptop/viewComparation?tipe=KM">
            <h6 class="text-primary mb-0">Comparison Years</h6>
            <i class="fas fa-angle-down"></i>
        </a>
        <a class="text-center" href="<?=base_url()?>Laptop/viewList?tipe=KM">
            <h6 class="text-primary mb-0">See Detail</h6>
            <i class="fas fa-angle-down"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div class="text-primary fw-bold" style="font-size:1.2em;">Mean Time Between Failures</div>
        <div class="text-primary fw-bold" style="font-size:0.8em;">(Month)</div>
      </div>
      <div class="card-body text-center">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="chart-mtbf-p1" style="width: 100%; height: 120px; background-color:transparent;"></div> 
            <div class="text-secondary mb-2" style="font-size:12px;">Target : <?=$dataSelisih[0]->MTBF_TARGET_1?></div>
          </div>
          <div class="col-md-6 position-relative text-center mb-2">
            <div class="text-secondary mb-2" style="font-size:12px;">Period 1</div>
              <?php if(substr($dataSelisih[0]->SELISIH_MTBF_1, 0, 1) == '-'): ?>
                  <h6 class="text-danger fw-bold"><i class="fa fa-arrow-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_1,0) ?: '0'?></h6>
              <?php else : ?>
                  <h6 class="text-success fw-bold"><i class="fa fa-arrow-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_1,0) ?: '0'?></h6>
              <?php endif; ?>
          </div>
        </div>
        <hr class="hr hr-blurry"/>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="chart-mtbf-p2" style="width: 100%; height: 120px; background-color:transparent;"></div> 
            <div class="text-secondary mb-2" style="font-size:12px;">Target : <?=$dataSelisih[0]->MTBF_TARGET_2?></div>
          </div>
          <div class="col-md-6 position-relative text-center mb-2">
            <div class="text-secondary mb-2" style="font-size:12px;">Period 2</div>
              <?php if(substr($dataSelisih[0]->SELISIH_MTBF_2, 0, 1) == '-'): ?>
                  <h6 class="text-danger fw-bold"><i class="fa fa-arrow-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_2,0) ?: '0'?></h6>
              <?php else : ?>
                  <h6 class="text-success fw-bold"><i class="fa fa-arrow-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_2,0) ?: '0'?></h6>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <a class="text-center" href="<?=base_url()?>Laptop/viewComparation?tipe=MTBF">
            <h6 class="text-primary mb-0">Comparison Years</h6>
            <i class="fas fa-angle-down"></i>
        </a>
        <a class="text-center" href="<?=base_url()?>Laptop/viewList?tipe=MTBF">
            <h6 class="text-primary mb-0">See Detail</h6>
            <i class="fas fa-angle-down"></i>
        </a>
      </div>
    </div>
  </div>
</div>


</div>
<script type="text/javascript">
function printPDF(){
  $('#header').removeClass('d-none');
  $('.total-users').removeClass('wave');
  var HTML_Width = $("#pdf").width();
  var HTML_Height = $("#pdf").height();
  var top_left_margin = 30;
  var PDF_Width = HTML_Width+(top_left_margin*2);
  var PDF_Height = (PDF_Width*1)+(top_left_margin*2);
  var canvas_image_width = HTML_Width;
  var canvas_image_height = HTML_Height;
  var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
  var pdf = new jsPDF('p', 'pt',  "a4");
  var width = pdf.internal.pageSize.width;
  var height = pdf.internal.pageSize.height;
       
  html2canvas($("#pdf")[0],{allowTaint:true}).then(function(canvas) {
  canvas.getContext('2d');
  console.log(canvas.height+"  "+canvas.width);
  var imgData = canvas.toDataURL("image/jpeg", 1.0);
  pdf.addImage(imgData, 'JPG', 5, 30,width-10,height-100);
  window.open(pdf.output('bloburl'), '_blank');
  
  });
  $('#header').addClass('d-none');
  $('.total-users').addClass('wave');

}

$(document).ready(function() {
    $('.tahun').on('change', function() {
      location.href="<?=base_url()?>Laptop?tahun="+$(this).val();
    });

    Chart.register(ChartDataLabels);

    const formatter = (value, ctx) => {
        return value.toLocaleString()+'%';
    };

    const formatterNonPercentage = (value, ctx) => {
        return value.toLocaleString();
    };

    var chart = JSC.chart('chart-ar-p1', { 
        debug: true,  
        legend_visible: false, 
        yAxis: [ 
            { 
            line_visible: true, 
            defaultTick_enabled: false, 
            scale_range: [0, 100] 
            }, 
        ], 
        xAxis: [ 
            { 
            defaultTick_gridLine_width: 0, 
            spacingPercentage: 0.15 
            }, 
        ], 
        defaultSeries: { 
            type: 'gauge column roundCaps', 
            shape: { 
            label: [ 
                { 
                text: '%sum%', 
                verticalAlign: 'middle', 
                style_fontSize: 14 
                } 
            ] 
            } 
        }, 
        series: [ 
            { 
            points: [['Achievement', <?=round($dataSelisih[0]->AR_1, 2)?>]] 
            }, 
        ] 
    });

    var chart = JSC.chart('chart-ar-p2', { 
        debug: true,  
        legend_visible: false, 
        yAxis: [ 
            { 
            line_visible: true, 
            defaultTick_enabled: false, 
            scale_range: [0, 100] 
            }, 
        ], 
        xAxis: [ 
            { 
            defaultTick_gridLine_width: 0, 
            spacingPercentage: 0.15 
            }, 
        ], 
        defaultSeries: { 
            type: 'gauge column roundCaps', 
            shape: { 
            label: [ 
                { 
                text: '%sum%', 
                verticalAlign: 'middle', 
                style_fontSize: 14 
                } 
            ] 
            } 
        }, 
        series: [ 
            { 
            points: [['Achievement', <?=round($dataSelisih[0]->AR_2, 2)?>]] 
            }, 
        ] 
    });

    var chart = JSC.chart('chart-km-p1', { 
        debug: true,  
        legend_visible: false, 
        yAxis: [ 
            { 
            line_visible: true, 
            defaultTick_enabled: false, 
            scale_range: [0, 100] 
            }, 
        ], 
        xAxis: [ 
            { 
            defaultTick_gridLine_width: 0, 
            spacingPercentage: 0.15 
            }, 
        ], 
        defaultSeries: { 
            type: 'gauge column roundCaps', 
            shape: { 
            label: [ 
                { 
                text: '%sum%', 
                verticalAlign: 'middle', 
                style_fontSize: 14 
                } 
            ] 
            } 
        }, 
        series: [ 
            { 
            points: [['Achievement', <?=round($dataSelisih[0]->KM_1, 2)?>]] 
            }, 
        ] 
    });

    var chart = JSC.chart('chart-km-p2', { 
        debug: true,  
        legend_visible: false, 
        yAxis: [ 
            { 
            line_visible: true, 
            defaultTick_enabled: false, 
            scale_range: [0, 100] 
            }, 
        ], 
        xAxis: [ 
            { 
            defaultTick_gridLine_width: 0, 
            spacingPercentage: 0.15 
            }, 
        ], 
        defaultSeries: { 
            type: 'gauge column roundCaps', 
            shape: { 
            label: [ 
                { 
                text: '%sum%', 
                verticalAlign: 'middle', 
                style_fontSize: 14 
                } 
            ] 
            } 
        }, 
        series: [ 
            { 
            points: [['Achievement', <?=round($dataSelisih[0]->KM_2, 2)?>]] 
            }, 
        ] 
    });

    var chart = JSC.chart('chart-mtbf-p1', { 
        debug: true,  
        legend_visible: false, 
        yAxis: [ 
            { 
            line_visible: true, 
            defaultTick_enabled: false, 
            scale_range: [0, 6] 
            }, 
        ], 
        xAxis: [ 
            { 
            defaultTick_gridLine_width: 0, 
            spacingPercentage: 0.15 
            }, 
        ], 
        defaultSeries: { 
            type: 'gauge column roundCaps', 
            shape: { 
            label: [ 
                { 
                text: '%sum', 
                verticalAlign: 'middle', 
                style_fontSize: 14 
                } 
            ] 
            } 
        }, 
        series: [ 
            { 
            points: [['Achievement', <?=round($dataSelisih[0]->MTBF_1, 0)?>]] 
            }, 
        ] 
    });

    var chart = JSC.chart('chart-mtbf-p2', { 
        debug: true,  
        legend_visible: false, 
        yAxis: [ 
            { 
            line_visible: true, 
            defaultTick_enabled: false, 
            scale_range: [0, 12] 
            }, 
        ], 
        xAxis: [ 
            { 
            defaultTick_gridLine_width: 0, 
            spacingPercentage: 0.15 
            }, 
        ], 
        defaultSeries: { 
            type: 'gauge column roundCaps', 
            shape: { 
            label: [ 
                { 
                text: '%sum', 
                verticalAlign: 'middle', 
                style_fontSize: 14 
                } 
            ] 
            } 
        }, 
        series: [ 
            { 
            points: [['Achievement', <?=round($dataSelisih[0]->MTBF_2, 0)?>]] 
            }, 
        ] 
    });
   
});
</script>