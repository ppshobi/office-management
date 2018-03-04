<script>
    export default {
        methods: {
            remove: function(index) {
               $(`#course-${index}`).remove();
            }
        }
    }
</script>