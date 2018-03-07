<script>
    import moment from 'moment';
    export default {
        props: ['student'],

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

        mounted(){
            this.name = this.student.name;
            $("#dob").val(moment(this.student.dob, "YYYY-MM-DD h:m:s").format("DD/MM/YYYY"));
            this.courseId =  this.student.course_id;
            this.guardian =  this.student.guardians_name;
            this.phone =  this.student.phone_number;
            this.address =  this.student.address;
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

               axios.patch('/student/'+this.student.id,{
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
