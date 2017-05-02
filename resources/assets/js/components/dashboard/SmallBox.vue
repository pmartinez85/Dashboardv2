<template>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ value }}</h3>

                <p>{{ name | capitalize}}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</template>

<script>
    import voca from 'voca';
    import pluralize from 'pluralize'

    export default {
        data: function () {
            return {
              nameData: '',
              value: 0
            }
          },
          props: {
            name: {
              type: String,
              required: true
            }
          },
        mounted() {
            this.nameData = this.name
            this.value = this.dashboardValue(this.nameData)
            console.log('Component smallbox mounted.')
            console.log(this.eventName())
            this.$echo.channel('dashboard').listen(this.eventName(), (payload) => {
              console.log('Event received!!!!!!!!!')
              console.log(payload);
              this.value++
            });
        },
        methods: {
            eventName() {
                return voca.capitalize(pluralize.singular(this.name))+'Created'
            },
            dashboardValue (name) {
                var component = this
                axios.get('/dashboard/' + name + '/number')
                  .then(function (response) {
                    console.log(response.data)
                    component.value = response.data
                  })
                  .catch(function (error) {
                    console.log(error)
                  });
            },
        }
    }
</script>
