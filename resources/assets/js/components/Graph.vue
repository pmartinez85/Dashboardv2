<template>
    <canvas id="graph"></canvas>
</template>

<script>
    import Chart from 'chart.js'
    export default {
        mounted() {
            console.log('Component mounted.')
            var data = {
             labels: ['gener', 'febrer','març'],
             datasets: [
                 {
                     label: 'Samarretes',
                     data: [25,50,5]
                 },
                 {
                     label: 'Pantalons',
                     data: [50, 45, 30]
                 }
             ]
            }
            var context = document.querySelector('#graph').getContext('2d')
            new Chart(context,{
             type: "bar",
             data: data,
            })
        }
    }
</script>
