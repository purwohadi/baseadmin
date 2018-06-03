<div class="modal modal-danger" tabindex="-1" role="dialog" id="modal-confirm-delete" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="idToBeDeleted">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteItem()">I'm sure</button>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(id) {
        $('#idToBeDeleted').val(id);
        $('#modal-confirm-delete').modal();
    }

    function deleteItem(){
        document.getElementById('delete-form-' + $('#idToBeDeleted').val()).submit();
    }
</script>
