<template>
    <div class="col-md-12 btn-group">
        <button class="btn btn-danger btn-sm" @click="remove">Delete</button>
        <button class="btn btn-primary btn-sm" @click="update">Update</button>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    export default {
        props: ['id', 'url', 'index', 'message'],
        data() {
            return {
                msg: "Once deleted, you will not be able to Undo"
            }
        },

        mounted() {
            if(this.message != null){
                this.msg = this.message;
            }
        },

        created() {

        },

        methods:{
            remove: function() {
               swal({
                 title: "Are you sure?",
                 text: this.msg,
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                    let self=this;
                    axios.delete(this.url+'/'+this.id)
                    .then(function(response) {
                        toastr.info(response.data.message)
                        self.$emit('removed');
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
