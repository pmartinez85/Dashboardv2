<template>
    <div>
        <canvas ref="canvas"></canvas>
        <div v-html="legend"></div>
    </div>
</template>

<script>
import Chart from 'chart.js'
export default {
  props: {
    url: {
      type: String
    },
    labels: {
      type: Array
    },
    values: {
      type: Array
    },
    color: {
      type: String,
      default: 'rgba(75,192,192,0.4)'
    }
  },
  data() {
    return {
      legend: ''
    }
  },
  mounted() {
    //Fetch API -> Standard Javascript
    fetch(this.url, {
      method: 'get'
    }).then(function(response) {
      console.log(response.data)
      this.values = response.data.values3
      this.labels = response.data.labels3
    }).catch(function(err) {
      // Error :(
      //TODO
    });
    console.log('Component mounted.')
    let data = {
      labels: this.labels ,
      datasets: [
        {
          label: "My First dataset",
          fill: false,
          lineTension: 0.1,
          backgroundColor: this.color,
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          data: this.values,
          spanGaps: false,
        }
      ]
    };
    console.log(this.$children)
    let context = this.$refs.canvas.getContext('2d')
    let chart= new Chart(context, {
      type: 'bar',
      data: data
    })
    this.legend = chart.generateLegend()
  }
}
</script>
