<template>
    <ul class="timeline">
        <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
        </li>

        <li v-for="(activity, index) in activities">
            <i class="fa fa-envelope bg-blue"></i>

            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{ activity.updated_at }}</span>

                <h3 class="timeline-header">{{ getTitle(activity.type) }}</h3>

                <div class="timeline-body">
                    TODO DESCRIPTION {{ activity.type }}
                </div>
                <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                </div>
            </div>
        </li>

    </ul>
</template>

<script>
    export default {
      data: function () {
        return {
          activities : []
        }
      },
        mounted() {
          console.log('Component activity feed!')
          this.fetchActivityFeed()
        },
        methods: {
        getTitle: function (type) {
            switch(type) {
              case 'created_task':
                return 'Tasca creada'
              case 'created_thread':
                return 'Thread creat'
              default:
                return 'Característica creada'
            }
          },
            fetchActivityFeed () {
              console.log('fetchActivityFeed executed!')
              var component = this
              axios.get('/activity-feed')
                .then(function (response) {
                  console.log(response.data)
                  component.activities = response.data
                })
                .catch(function (error) {
                  console.log(error)
                });
            },
        }
    }
</script>
