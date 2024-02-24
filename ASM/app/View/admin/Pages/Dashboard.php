<?php


use app\Model\UserModel;
use  app\Model\ProductModel;
use app\Model\InvoiceModel;

$InvoiceModel = new InvoiceModel();
$UserModel =  new UserModel();
$ProductModel = new ProductModel();
$currentDay = date('d');
$currentMonth = date('m');
$currentYear = date('Y');

?>




<div class="col-lg-12 grid-margin stretch-card">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-3 stretch-card grid-margin">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Khách hàng <i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5"><?= $UserModel->CountUserAccount()['COUNT(user_id)']; ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Quản trị viên <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5"><?
                                $UserModel =  new UserModel();
                                echo $UserModel->CountUserAdmin()['COUNT(user_id)']; ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Hóa đơn tháng <?= $currentMonth . '/' . $currentYear ?> <i class="mdi mdi-diamond mdi-20px float-right"></i>
              </h4>
              <h2 class="mb-5"><?
                                $UserModel =  new UserModel();
                                echo  $UserModel->CountUserInvoicesEveryMonth($currentMonth)['COUNT(Invoice_id)'];
                                ?>
              </h2>
            </div>
          </div>
        </div>

        <div class="col-md-3 stretch-card grid-margin">
          <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Doanh thu tháng <?= $currentMonth . '/' . $currentYear ?> <i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5">
                <?
                $UserModel =  new UserModel();
                echo  number_format($UserModel->monthlyRevenue($currentMonth)['SUM(total)']) ?>đ</h2>
              </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Số đơn hàng theo từng tháng trong năm <?= $currentYear ?></h4>
              <canvas id="barChart" style="height:230px"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Doanh thu theo từng tháng trong năm <?= $currentYear ?></h4>
              <canvas id="lineChart" style="height:250px"></canvas>
            </div>
          </div>
        </div>

      </div>
      <?php
      $dataPoints = [];
      for ($i = 1; $i < 13; $i++) {
        $UserModel = new UserModel();
        $data =  $UserModel->CountUserInvoicesEveryMonth($i)['COUNT(Invoice_id)'];
        $dataPoints[] += $data;
      }


      $dataPayments = [];
      for ($i = 1; $i < 13; $i++) {
        $UserModel = new UserModel();
        $data =  $UserModel->monthlyRevenue($i)['SUM(total)'];
        $dataPayments[] += $data;
      }

      ?>
      <script>
        var data = {
          labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
          datasets: [{
            label: 'Số lượng đơn hàng',
            data: <? echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
        };
        var dataPayment = {
          labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
          datasets: [{
            label: 'Doanh thu',
            data: <? echo json_encode($dataPayments, JSON_NUMERIC_CHECK); ?>,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
        };
        if ($("#barChart").length) {
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data,
            options: options
          });
        }

        if ($("#barChartDark").length) {
          var barChartCanvasDark = $("#barChartDark").get(0).getContext("2d");
          var barChartDark = new Chart(barChartCanvasDark, {
            type: 'bar',
            data: dataDark,
            options: optionsDark
          });
        }
        if ($("#lineChart").length) {
          var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
          var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: dataPayment,
            options: options
          });
        }

        if ($("#lineChartDark").length) {
          var lineChartCanvasDark = $("#lineChartDark").get(0).getContext("2d");
          var lineChartDark = new Chart(lineChartCanvasDark, {
            type: 'line',
            data: dataPaymentDark,
            options: optionsDark
          });
        }
        var options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }

        };
        var optionsDark = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              gridLines: {
                color: '#322f2f',
                zeroLineColor: '#322f2f'
              }
            }],
            xAxes: [{
              ticks: {
                beginAtZero: true
              },
              gridLines: {
                color: '#322f2f',
              }
            }],
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }

        };
      </script>
      <div class="row">

      </div>
      <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Đơn hàng hôm nay (<?= $currentDay . '/' . $currentMonth . '/' . $currentYear ?>)</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> # </th>
                      <th> Name </th>
                      <th> Ngày đặt hàng </th>
                      <th> Địa chỉ </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                    // $InvoiceModel = new InvoiceModel();
                    $results = $InvoiceModel->getAllInvoiceToDay($currentDay, $currentMonth, $currentYear);
                    foreach ($results as $result) {
                    ?>
                      <tr>
                        <td> <? echo $result['Invoice_id'] ?> </td>
                        <td> <? echo $result['user_name'] ?> </td>
                        <td> <? echo $result['Invoice_date'] ?> </td>
                        <td> <? echo $result['user_adress'] ?> </td>
                      </tr>
                    <?
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-white">Todo</h4>
              <div class="add-items d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
                <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
              </div>
              <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Call John </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Create invoice </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Print Statements </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <script src="assets/js/chart.js"></script> -->