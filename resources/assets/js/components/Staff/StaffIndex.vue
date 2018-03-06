<script>
    export default {
        methods: {
            remove: function(index) {
               $(`#staff-${index}`).remove();
            }
        }
    }
</script>