<template>
    <div>
        <canvas id="line-chart2" height="220"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';
    import { COLORS } from '../../../adminator/scripts/constants/colors';

    export default {
        data() {
            return {
                income: [60, 50, 70, 60, 29, 51, 64,89,100,150,0,-10],
                expense:  [100, 60, 50, 70, 60,80,100,15,0,200,10,5]
            }
        },

        mounted() {
            this.initialize();
        },

        methods: {
            initialize: function () {
                 const lineChartBox = document.getElementById('line-chart2');
                  if (lineChartBox) {
                    const lineCtx = lineChartBox.getContext('2d');
                    lineChartBox.height = 80;

                    new Chart(lineCtx, {
                      type: 'line',
                      data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June',
                                 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [{
                          label                : 'Income',
                          backgroundColor      : 'rgba(232, 245, 233, 0.3)',
                          borderColor          : COLORS['green-500'],
                          pointBackgroundColor : COLORS['green-700'],
                          borderWidth          : 2,
                          data                 : this.income,
                        }, {
                          label                : 'Expense',
                          backgroundColor      : 'rgba(237, 231, 246, 0.3)',
                          borderColor          : COLORS['red-500'],
                          pointBackgroundColor : COLORS['red-700'],
                          borderWidth          : 2,
                          data                 : this.expense,
                        }],
                      },

                      options: {
                        legend: {
                          display: false,
                        },
                      },

                    });
                  }
            }
        }

    }

</script>
