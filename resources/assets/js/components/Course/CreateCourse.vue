<template>
    <form class="form-horizontal col-md-12" id="transaction">
         <div class="form-group">
            <label for="course-name" class="col-md-4 control-label">Course Name</label>
            <div class="col-md-6">
                <input id="course-name" v-model="name" class="form-control"
                    placeholder="Enter course name" name="name" required autofocus>
            </div>
         </div>
         <div class="form-group">
             <label for="duration" class="col-md-4 control-label">Course Duration</label>

             <div class="col-md-6">
                 <input id="duration" type="number" v-model="duration" class="form-control" name="duration"
                 placeholder="Enter Duration in months" required>
             </div>
         </div>
          <div class="form-group">
              <label for="recurring" class="col-md-4 control-label">Monthly Fee</label>
              <div class="col-md-1">
                  <input id="recurring" type="checkbox" v-model="recurring" name="recurring">
              </div>
          </div>
         <div class="form-group">
             <label for="fees" class="col-md-4 control-label">Course Fees</label>

             <div class="col-md-6">
                 <input id="fees" type="fees" class="form-control" v-model="price" name="fees" placeholder="Enter course fee" required>
             </div>
         </div>

         <div class="form-group">
             <div class="col-md-8 col-md-offset-4">
                 <button type="submit" @click="submit" class="btn btn-primary">
                     Create Course
                 </button>
             </div>
         </div>
          <div class="form-group">
             <div class="col-md-6 col-md-offset-4">
                 <div class="alert alert-danger" v-if="errors">
                    <ul>
                        <li v-for="error in this.errors">{{ error[0] }}</li>
                    </ul>
                 </div>
             </div>
          </div>
    </form>
</template>

<script>

    export default {
        data() {
            return {
                name:'',
                duration: '',
                price: '',
                recurring: false,
                errors:null
            }
        },

        methods:{

           reset: function () {
               this.name = '';
               this.price = '';
               this.duration = '';
               this.recurring = false;
               this.errors = null;
           },

           submit: function(e) {
               e.preventDefault();

               axios.post('/course',{
                    name: this.name,
                    price: this.price,
                    duration: this.duration,
                    recurring: this.recurring,
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
