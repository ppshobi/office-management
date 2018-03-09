<script>

    export default {
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

               axios.post('/staff',{
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
