<script>
    $('#edit').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 
    var jabatan = button.data('jabatan') 
    var id = button.data('id') 
    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #jabatan').val(jabatan)
})
</script>