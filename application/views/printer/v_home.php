<div><h5 class="fw-bold"><i class="fa fa-print"></i> Printer</h5></div>
    
  <div class="row justify-content-between align-items-center mt-4">
      <div class="col-md-3 align-self-stretch mb-4">
      </div>
      <div class="col-md-3 mb-4">
          <select data-mdb-select-init class="tahun">
              <?php for($i = 0; $i < 10; $i++): ?>
                  <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
              <?php endfor; ?>
          </select>
          <label class="form-label select-label">Filter Year</label>
      </div>
  </div>
<div class="row mb-2">
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-primary border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-primary fw-bold" style="font-size:0.6em;">User Frequency</div>
                    <div class="text-primary fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->PR_FPG*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Achievement</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->TARGET_FPG*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Target</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-success border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-success fw-bold" style="font-size:0.6em;">Repair Frequency</div>
                    <div class="text-success fw-bold" style="font-size:0.7em;">x&#772;</div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->PR_FPB,2) ?: '0'?></h6>
                            <div class="text-secondary" style="font-size:12px;">Achievement</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->TARGET_FPB,2) ?: '0'?></h6>
                            <div class="text-secondary" style="font-size:12px;">Target</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-warning border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-warning fw-bold" style="font-size:0.6em;">Users Sactifaction</div>
                    <div class="text-warning fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->PR_TK*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Achievement</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->TARGET_TP*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Target</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
</div>

<div class="row mb-5">
    <div class="col-md-12 mb-5">
        <div class="card bg-transparent shadow-0 border border-primary border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-primary fw-bold" style="font-size:0.8em;">User Frequency</div>
                    <div class="text-primary fw-bold" style="font-size:1em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-fpg" height="100"></canvas>
                <div class="text-center mt-5">
                    <a href="<?=base_url()?>Printer/viewList?tipe=FREKUENSI PENGGUNA">
                        <h6 class="text-primary mb-0">See Detail</h6>
                        <i class="fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-5">
        <div class="card bg-transparent shadow-0 border border-success border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-success fw-bold" style="font-size:0.8em;">Repair Frequency</div>
                    <div class="text-success fw-bold" style="font-size:1em;">x&#772;</div>
                </div>
                <canvas class="chart-fpb" height="100"></canvas>
                <div class="text-center mt-5">
                    <a href="<?=base_url()?>Printer/viewList?tipe=FREKUENSI PERBAIKAN">
                        <h6 class="text-success mb-0">See Detail</h6>
                        <i class="text-success fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-5">
        <div class="card bg-transparent shadow-0 border border-warning border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-warning fw-bold" style="font-size:0.8em;">Users Sactifaction</div>
                    <div class="text-warning fw-bold" style="font-size:1em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-tk" height="100"></canvas>
                <div class="text-center mt-5">
                    <a href="<?=base_url()?>Printer/viewList?tipe=TINGKAT KEPUASAN">
                        <h6 class="text-warning mb-0">See Detail</h6>
                        <i class="text-warning fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    Chart.register(ChartDataLabels);

    const formatter = (value, ctx) => {
        return value.toLocaleString()+'%';
    };

    const formatterNonPercentage = (value, ctx) => {
        return value.toLocaleString();
    };

    // FREKUENSI PENGGUNA
    const dataChartFPG = {
    type: "line",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'center',
          align: 'top',
          clamp: true
        },
        legend : {
            position:'bottom',
        }
      }, 
      scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                grace: '2%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Target",
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($targetFPG)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPG)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-fpg'), dataChartFPG);

  // FREKUENSI PERBAIKAN
  const dataChartFPB = {
    type: "line",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'center',
          align: 'top',
          clamp: true
        },
        legend : {
            position:'bottom',
        }
      }, 
      scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                grace: '2%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Target",
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($targetFPB)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(20, 164, 77, 0.2)',
          ],
          borderColor: [
            'rgba(20, 164, 77, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPB)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
      ],
    },
  };
  new Chart($('.chart-fpb'), dataChartFPB);

  // TINGKAT KEPUASAN
  const dataChartTK = {
    type: "line",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'center',
          align: 'top',
          clamp: true
        },
        legend : {
            position:'bottom',
        }
      }, 
      scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                grace: '5%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Target",
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($targetTK)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(228, 161, 27, 0.2)',
          ],
          borderColor: [
            'rgba(228, 161, 27, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementTK)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-tk'), dataChartTK);
});
</script>