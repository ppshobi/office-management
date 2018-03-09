<script>
    import moment from 'moment';

    export default {
        props:['staff'],

        data() {
            return {
               name : '',
               salary : '',
               phone :  '',
               address :  '',
               designation :'',
               errors : null
            }
        },

        mounted() {
            this.name = this.staff.name;
            $("#dob").val(moment(this.staff.dob, "YYYY-MM-DD h:m:s").format("DD/MM/YYYY"));
            this.phone =  this.staff.phone_number;
            this.address =  this.staff.address;
            this.salary = this.staff.salary;
            this.designation = this.staff.designation;
        },

        methods:{

           reset: function () {
                this.name = '';
                $("#dob").val('');
                this.salary = '';
                this.phone =  '';
                this.address =  '';
                this.designation ='';
                this.errors = null
           },

           submit: function(e) {
               e.preventDefault();

               axios.patch('/staff/'+this.staff.id,{
                    name:this.name,
                    dob: $("#dob").val(),
                    phone: this.phone,
                    salary: this.salary,
                    designation: this.designation,
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
