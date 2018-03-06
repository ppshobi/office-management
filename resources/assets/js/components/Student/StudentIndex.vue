<script>
    export default {
        methods: {
            remove: function(index) {
               $(`#student-${index}`).remove();
            }
        }
    }
</script>