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

<div class="mb-4"><h5 class="fw-bold"><i class="fa fa-desktop"></i> Personal Computer</h5></div>
<a href="<?=base_url()?>PC" class="btn btn-danger mb-4"><i class="fa fa-arrow-left"></i> Back</a>

<div class="mb-4"><h6 class="fw-bold"><i class="fas fa-chart-bar"></i> &nbsp;&nbsp;Comparison Data Between Years</h6></div>
<div class="row mt-3 mb-4">
    <?php if($tipe == 'AR'): ?>
    <div class="col-md-12">
        <div class="card bg-transparent shadow-0 border border-primary border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-primary fw-bold" style="font-size:0.8em;">Comparation Availability Rate</div>
                    <div class="text-primary fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-ar-compare" height="100"></canvas>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($tipe == 'KM'): ?>
    <div class="col-md-12">
        <div class="card bg-transparent shadow-0 border border-success border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-success fw-bold" style="font-size:0.8em;">Comparation Maintenance Success</div>
                    <div class="text-success fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-km-compare" height="100"></canvas>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($tipe == 'MTBF'): ?>
    <div class="col-md-12">
        <div class="card bg-transparent shadow-0 border border-warning border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-warning fw-bold" style="font-size:0.8em;">Comparation Mean Time Between Failures</div>
                    <div class="text-warning fw-bold" style="font-size:0.8em;">(Month)</div>
                </div>
                <canvas class="chart-mtbf-compare" height="100"></canvas>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- <div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-transparent shadow-0 border-bottom border-top border-primary border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-primary fw-bold" style="font-size:0.8em;">Availability Rate</div>
                    <div class="text-primary fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-ar mb-3" height="300"></canvas>
                <div class="col-md-12 align-self-stretch mb-2">
                      <div class="card shadow-2 h-100">
                          <div class="card-body pt-3 pb-2">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="text-secondary fw-bold" style="font-size:0.8em;">Deviation Availability Rate</div>
                                  <div class="text-primary fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
                              </div>
                                  <div class="row align-items-center justify-content-between mt-4">
                                      <div class="col-md-6 position-relative text-center mb-2">
                                        <div class="text-secondary mb-2" style="font-size:12px;">Period 1</div>
                                          <?php if(substr($dataSelisih[0]->SELISIH_AR_1, 0, 1) == '-'): ?>
                                              <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_1,2) ?: '0'?>%</h6>
                                          <?php else : ?>
                                              <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_1,2) ?: '0'?>%</h6>
                                          <?php endif; ?>
                                          <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                                      </div>
                                      <div class="col-md-6 position-relative text-center mb-2">
                                        <div class="text-secondary mb-2" style="font-size:12px;">Period 2</div>
                                          <?php if(substr($dataSelisih[0]->SELISIH_AR_2, 0, 1) == '-'): ?>
                                              <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_2,2) ?: '0'?>%</h6>
                                          <?php else : ?>
                                              <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_2,2) ?: '0'?>%</h6>
                                          <?php endif; ?>
                                      </div>
                                  </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?=base_url()?>PC/viewList?tipe=AR">
                <h6 class="text-primary mb-0">See Detail</h6>
                <i class="fas fa-angle-down"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-transparent shadow-0 border-bottom border-top border-success border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-success fw-bold" style="font-size:0.8em;">Maintenance Success</div>
                    <div class="text-success fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-km mb-3" height="300"></canvas>
                <div class="col-md-12 align-self-stretch mb-2">
                    <div class="card shadow-2">
                        <div class="card-body pt-3 pb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-secondary fw-bold" style="font-size:0.8em;">Deviation Maintenance Success</div>
                                <div class="text-success fw-bold" style="font-size:0.8em;"><i class="fa fa-percentage"></i></div>
                            </div>
                            <div class="row align-items-center justify-content-between mt-4">
                                <div class="col-md-6 position-relative text-center mb-2">
                                  <div class="text-secondary mb-2" style="font-size:12px;">Period 1</div>
                                    <?php if(substr($dataSelisih[0]->SELISIH_KM_1, 0, 1) == '-'): ?>
                                        <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_1,2) ?: '0'?>%</h6>
                                    <?php else : ?>
                                        <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_1,2) ?: '0'?>%</h6>
                                    <?php endif; ?>
                                    <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                                </div>
                                <div class="col-md-6 position-relative text-center mb-2">
                                  <div class="text-secondary mb-2" style="font-size:12px;">Period 2</div>
                                    <?php if(substr($dataSelisih[0]->SELISIH_KM_2, 0, 1) == '-'): ?>
                                        <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_2,2) ?: '0'?>%</h6>
                                    <?php else : ?>
                                        <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_2,2) ?: '0'?>%</h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?=base_url()?>PC/viewList?tipe=KM">
                <h6 class="text-success mb-0">See Detail</h6>
                <i class="fas fa-angle-down text-success"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-transparent shadow-0 border-bottom border-top border-warning border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-warning fw-bold" style="font-size:0.8em;">Mean Time Between Failures</div>
                    <div class="text-warning fw-bold" style="font-size:0.8em;">(Month)</div>
                </div>
                <canvas class="chart-mtbf mb-3" height="300"></canvas>
                <div class="col-md-12 align-self-stretch mb-2">
                      <div class="card shadow-2 h-100">
                          <div class="card-body pt-3 pb-2">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="text-secondary fw-bold" style="font-size:0.8em;">Deviation Mean Time Between Failures</div>
                                  <div class="text-warning fw-bold" style="font-size:0.8em;">(Mon)</div>
                              </div>
                                  <div class="row align-items-center justify-content-between mt-4">
                                      <div class="col-md-6 position-relative text-center mb-2">
                                        <div class="text-secondary mb-2" style="font-size:12px;">Period 1</div>
                                          <?php if(substr($dataSelisih[0]->SELISIH_MTBF_1, 0, 1) == '-'): ?>
                                              <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_1,2) ?: '0'?></h6>
                                          <?php else : ?>
                                              <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_1,2) ?: '0'?></h6>
                                          <?php endif; ?>
                                          <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                                      </div>
                                      <div class="col-md-6 position-relative text-center mb-2">
                                        <div class="text-secondary mb-2" style="font-size:12px;">Period 2</div>
                                          <?php if(substr($dataSelisih[0]->SELISIH_MTBF_2, 0, 1) == '-'): ?>
                                              <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_2,2) ?: '0'?></h6>
                                          <?php else : ?>
                                              <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_2,2) ?: '0'?></h6>
                                          <?php endif; ?>
                                      </div>
                                  </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?=base_url()?>PC/viewList?tipe=MTBF">
                <h6 class="text-warning mb-0">See Detail</h6>
                <i class="fas fa-angle-down text-warning"></i>
            </a>
        </div>
    </div>
</div> -->




</div> <!-- END DIV OF PDF -->

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
      location.href="<?=base_url()?>PC?tahun="+$(this).val();
    });

    Chart.register(ChartDataLabels);

    const formatter = (value, ctx) => {
        return value.toLocaleString()+'%';
    };

    const formatterNonPercentage = (value, ctx) => {
        return value.toLocaleString();
    };

    // AR
    const dataChartAR = {
      type: "bar",
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
                  grid: {
                  display: false
                  }
              }
          }
      },
      data: {
        labels: ["Period 1", "Period 2",],
        datasets: [{
            label: "Target",
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
            ],
            fill: true,
            borderColor: [
              'rgba(255,99,132,1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($targetAR)?>,
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
            fill: true,
            borderColor: [
              'rgba(102, 16, 242, 1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($achievementAR)?>,
            datalabels: {
              color: "black",
              formatter: formatter,
            }
          },
        ],
      },
    };
  new Chart($('.chart-ar'), dataChartAR);

    //   KM
  const dataChartKM = {
    type: "bar",
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
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: ["Period 1", "Period 2",],
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($targetKM)?>,
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
          fill: true,
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($achievementKM)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-km'), dataChartKM);

    // MTBF   
  const dataChartMTBF = {
    type: "bar",
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
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: ["Period 1", "Period 2",],
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($targetMTBF)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($achievementMTBF)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
      ],
    },
  };
  new Chart($('.chart-mtbf'), dataChartMTBF);

  const dataChartARCompare = {
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
                  },
                
              },
              y: {
                  grid: {
                  display: false
                  },
                  offset:true,
              }
          }
      },
      data: {
        labels: <?=json_encode($labelARComparison)?>,
        datasets: [{
            label: "Target",
            borderColor: [
              'rgba(255,99,132,1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($targetARComparison)?>,
            datalabels: {
              color: "black",
              formatter: formatter,
            }
          },
          {
            label: "Achievement",
            borderColor: [
              'rgba(102, 16, 242, 1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($achievementARComparison)?>,
            datalabels: {
              color: "black",
              formatter: formatter,
            }
          },
        ],
      },
    };
  new Chart($('.chart-ar-compare'), dataChartARCompare);

  const dataChartKMCompare = {
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
                  grid: {
                  display: false
                  },
                  offset:true,
              }
          }
      },
      data: {
        labels: <?=json_encode($labelKMComparison)?>,
        datasets: [{
            label: "Target",
            borderColor: [
              'rgba(255,99,132,1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($targetKMComparison)?>,
            datalabels: {
              color: "black",
              formatter: formatter,
            }
          },
          {
            label: "Achievement",
            borderColor: [
              'rgba(102, 16, 242, 1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($achievementKMComparison)?>,
            datalabels: {
              color: "black",
              formatter: formatter,
            }
          },
        ],
      },
    };
  new Chart($('.chart-km-compare'), dataChartKMCompare);

  const dataChartMTBFCompare = {
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
                  grid: {
                  display: false
                  },
                  offset:true,
              }
          }
      },
      data: {
        labels: <?=json_encode($labelMTBFComparison)?>,
        datasets: [{
            label: "Target",
            borderColor: [
              'rgba(255,99,132,1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($targetMTBFComparison)?>,
            datalabels: {
              color: "black",
              formatter: formatterNonPercentage,
            }
          },
          {
            label: "Achievement",
            borderColor: [
              'rgba(102, 16, 242, 1)',
            ],
            borderWidth: 2,
            borderRadius : 6,
            tension: 0.4,
            data: <?=json_encode($achievementMTBFComparison)?>,
            datalabels: {
              color: "black",
              formatter: formatterNonPercentage,
            }
          },
        ],
      },
    };
  new Chart($('.chart-mtbf-compare'), dataChartMTBFCompare);
});
</script>