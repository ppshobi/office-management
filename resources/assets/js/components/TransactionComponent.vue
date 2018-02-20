<template>

</template>

<script>
    export default {
        data() {
            return {

            }
        },

        mounted() {
            console.log('Transaction Component mounted.');
             $("#students").hide();
             $("#categories").hide();
             $("#staffs").hide();


        },

        created() {
            console.log('ceated');
        },

        methods:{
           transactionTypeChanged: function (change){
                console.log('came here' + typeof(change.target.value));

               if(change.target.value == 1)
               {
                   $("#categories").show();
               }
           }
        }
    }

</script>
