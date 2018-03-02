<template>
    <div class="col-md-12 btn-group">
        <button class="btn btn-danger btn-sm" @click="remove">Delete</button>
        <button class="btn btn-primary btn-sm" @click="update">Update</button>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    export default {
        props: ['id', 'url'],
        data() {
            return {

            }
        },

        mounted() {

        },

        created() {

        },

        methods:{
            remove: function() {
               swal({
                 title: "Are you sure?",
                 text: "Once deleted, you will not be able to Undo",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                    axios.delete(this.url+'/'+this.id)
                    .then(function(response) {
                        toastr.info(response.data.message);
                    }).catch(function (error) {
                        toastr.warning(error);
                    });
                 } else {
                    toastr.info("Cancelled");
                 }
               });
            },

            update: function() {
                swal('test')
            }
        },

        watch:{

        }
    }

</script>
