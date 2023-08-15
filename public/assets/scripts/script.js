let toggleMenu = document.querySelector("#toggleMenu");
let sidebar = document.querySelector(".sidebar");
let search = document.querySelector(".bx-search");

toggleMenu.onclick = function () {
    sidebar.classList.toggle("active");
};

search.onclick = function () {
    sidebar.classList.toggle("active");
};

const ctx = document.getElementById("myChart");

new Chart(ctx, {
  type: "doughnut",
  data: {
    datasets: [
      {

        data: [12, 19, 3,],
        backgroundColor: [
          'rgb(140,181,255)',
          'rgb(98,199,255)',
          'rgb(249,249,253)'
        ],
        hoverOffset: 4
      },
    ],
    labels: ["2022","2023"],
  },
});

const r = document.getElementById("chart");

new Chart(r, {
  type: "scatter",
  options: {
    animations: {
      tension: {
        duration: 2000,
        easing: 'linear',
        from: 1,
        to: 0,
        loop: true
      }
    },
    scales: {
      y: { // defining min and max so hiding the dataset does not change scale range
        min: 0,
        max: 40
      }
    }
  },
  data: {
    datasets: [
      {
        type: "bar",
        label: "Earnings this month",
        data: [5, 20, 25, 40],
        borderColor: 'rgb(255, 99, 132)',
    backgroundColor: 'rgb(155,146,255, 0.7)'
      },
      {
        type: "line",
        label: "Expense this month",
        data: [10, 15, 30, 35],
        fill: false,
    borderColor: 'rgb(58,65,111)',
    tension: 0.3

      },

    ],
    labels: ["January", "February", "March", "April"],
  },

});
