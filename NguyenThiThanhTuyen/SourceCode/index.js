var data = control.slice(Math.max(control.length - 10, 1));

// var DA_A2 = data.DA_A2.split(",").map(function (item) {
//   return parseInt(item, 10);
// });
var DA_A1 = [];
var DA_A2 = [];
var DA_A3 = [];
var AS_A1 = [];
var AS_A2 = [];
var AS_A3 = [];
var ND_A1 = [];
var ND_A2 = [];
var ND_A3 = [];
var Time = [];
var date = [];

$.each(data, (index, item) => {
  DA_A1.push(parseFloat(item.DA_A1 / 10));
  DA_A2.push(parseFloat(item.DA_A2 / 10));
  DA_A3.push(parseFloat(item.DA_A3 / 10));
  AS_A1.push(parseFloat(item.AS_A1));
  AS_A2.push(parseFloat(item.AS_A2));
  AS_A3.push(parseFloat(item.AS_A3));
  ND_A1.push(parseFloat(item.ND_A1 / 10));
  ND_A2.push(parseFloat(item.ND_A2 / 10));
  ND_A3.push(parseFloat(item.ND_A3 / 10));
  Time.push(item.Time);
  date.push(item.Date);
});

$(function () {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  "use strict";

  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true,
    },
  };

  // function readTextFile(file) {
  //   var rawFile = new XMLHttpRequest();
  //   rawFile.open("GET", file, false);
  //   rawFile.onreadystatechange = function () {
  //     if (rawFile.readyState === 4) {
  //       if (rawFile.status === 200 || rawFile.status == 0) {
  //         var allText = rawFile.responseText;
  //         alert(allText);
  //       }
  //     }
  //   };
  //   rawFile.send(null);
  // }
  // readTextFile("data.txt");

  var areaDataDA1 = {
    labels: Time,
    datasets: [
      {
        label: "# Độ ẩm 1",
        data: DA_A1,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataDA2 = {
    labels: Time,
    datasets: [
      {
        label: "# Độ ẩm 2",
        data: DA_A2,
        backgroundColor: [
          "rgba(255, 200, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: ["rgba(6, 19, 243, 0.26)"],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataDA3 = {
    labels: Time,
    datasets: [
      {
        label: "# Độ ẩm 3",
        data: DA_A3,
        backgroundColor: ["rgba(151, 13, 237, 0.2)"],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };
  var areaOptions = {
    plugins: {
      filler: {
        propagate: true,
      },
    },
  };

  var areaDataAS1 = {
    labels: Time,
    datasets: [
      {
        label: "# Ánh sáng 1",
        data: AS_A1,
        backgroundColor: ["rgba(245, 40, 145, 0.2)"],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataAS2 = {
    labels: Time,
    datasets: [
      {
        label: "# Ánh sáng 2",
        data: AS_A2,
        backgroundColor: ["rgba(255, 99, 71, 0.4)"],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataAS3 = {
    labels: Time,
    datasets: [
      {
        label: "# Ánh sáng 3",
        data: AS_A3,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataND1 = {
    labels: Time,
    datasets: [
      {
        label: "# Nhiệt độ 1",
        data: ND_A1,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataND2 = {
    labels: Time,
    datasets: [
      {
        label: "# Nhiệt độ 2",
        data: ND_A2,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };

  var areaDataND3 = {
    labels: Time,
    datasets: [
      {
        label: "# Nhiệt độ 3",
        data: ND_A3,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255,99,132,1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
      },
    ],
  };
  var areaOptions = {
    plugins: {
      filler: {
        propagate: true,
      },
    },
  };
  var scatterChartData = {
    datasets: [
      {
        label: "First Dataset",
        data: DA_A2,
        backgroundColor: ["rgba(255, 99, 132, 0.2)"],
        borderColor: ["rgba(255,99,132,1)"],
        borderWidth: 1,
      },
      {
        label: "Second Dataset",
        data: DA_A2,
        backgroundColor: ["rgba(54, 162, 235, 0.2)"],
        borderColor: ["rgba(54, 162, 235, 1)"],
        borderWidth: 1,
      },
    ],
  };

  var scatterChartOptions = {
    scales: {
      xAxes: [
        {
          type: "linear",
          position: "bottom",
        },
      ],
    },
  };

  //Độ ẩm

  if ($("#areaChartDA1").length) {
    var areaChartCanvas = $("#areaChartDA1").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataDA1,
      options: areaOptions,
    });
  }
  if ($("#areaChartDA2").length) {
    var areaChartCanvas = $("#areaChartDA2").get(0).getContext("2d");
    var areaChart1 = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataDA2,
      options: areaOptions,
    });
  }

  if ($("#areaChartDA3").length) {
    var areaChartCanvas = $("#areaChartDA3").get(0).getContext("2d");
    var areaChart1 = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataDA3,
      options: areaOptions,
    });
  }

  //ánh sáng
  if ($("#areaChartAS1").length) {
    var areaChartCanvas = $("#areaChartAS1").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataAS1,
      options: areaOptions,
    });
  }
  if ($("#areaChartAS2").length) {
    var areaChartCanvas = $("#areaChartAS2").get(0).getContext("2d");
    var areaChart1 = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataAS2,
      options: areaOptions,
    });
  }

  if ($("#areaChartAS3").length) {
    var areaChartCanvas = $("#areaChartAS3").get(0).getContext("2d");
    var areaChart1 = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataAS3,
      options: areaOptions,
    });
  }

  //Nhiệt độ
  if ($("#areaChartND1").length) {
    var areaChartCanvas = $("#areaChartND1").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataND1,
      options: areaOptions,
    });
  }
  if ($("#areaChartND2").length) {
    var areaChartCanvas = $("#areaChartND2").get(0).getContext("2d");
    var areaChart1 = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataND2,
      options: areaOptions,
    });
  }

  if ($("#areaChartND3").length) {
    var areaChartCanvas = $("#areaChartND3").get(0).getContext("2d");
    var areaChart1 = new Chart(areaChartCanvas, {
      type: "line",
      data: areaDataND3,
      options: areaOptions,
    });
  }

  if ($("#scatterChart").length) {
    var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: "scatter",
      data: scatterChartData,
      options: scatterChartOptions,
    });
  }

  if ($("#browserTrafficChart").length) {
    var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: "doughnut",
      data: browserTrafficData,
      options: doughnutPieOptions,
    });
  }
});
