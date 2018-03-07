<script>

    export default {
        data() {
            return {
                name:'',
                dob: '',
                courseId: '',
                guardian: '',
                phone: '',
                address: '',
                errors:null
            }
        },

        methods:{

           reset: function () {
                this.name = '',
                this.dob =  '',
                this.courseId =  '',
                this.guardian =  '',
                this.phone =  '',
                this.address =  '',
                this.errors = null
           },

           submit: function(e) {
               e.preventDefault();

               axios.post('/student',{
                    name:this.name,
                    dob: $("#dob").val(),
                    course: this.courseId,
                    guardian: this.guardian,
                    phone: this.phone,
                    address: this.address,
               }).then((resp) => {
                    toastr.success(resp.data.message);
                    this.reset();
               }).catch((error) => {
                    toastr.error(error.response.data.message);
                    this.errors = error.response.data.errors;
               });
           }
        },
    }

</script>
