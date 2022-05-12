const graph = document.getElementById("graph").getContext("2d");

Chart.defaults.global.defaultFontSize = 18;

let massPopChart = new Chart(graph, {
  type: "pie", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: [
      "A faire",
      "Terminées",
    ],
    datasets: [
      {
        label: "Population en M ",
        data: [6, 8,],
        // backgroundColor: "blue",
        backgroundColor: [
          "red",
          "green",
        ],
        hoverBorderWidth: 3,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Commandes",
      fontSize: 24,
    },
    layout: {
      padding: {
        left: 100,
        right: 100,
        top: 400,
      },
    },
  },
});