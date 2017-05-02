<template>
<a class="btn btn-app" @click="increase"><i class="fa fa-plus"></i> Increase {{name}}</a>
</template>

<script>
    export default {
         props: {
            name: {
              type: String,
              required: true
            }
          },
        mounted() {
            console.log('Component increase button mounted.')
        },
        methods: {
            increase () {
                console.log('Increase being executed!')
                axios.get('/create/random/' + this.name )
                  .then(function (response) {
                    console.log(response.data)
                  })
                  .catch(function (error) {
                    console.log(error)
                  });
            },
        }
    }
</script>
