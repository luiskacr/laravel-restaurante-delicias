<!-- Delete Partials -->
<div class="modal " id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advertencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>¿Está seguro que desea eliminar este elemento?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button"  id="deleteBtn" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    let token = '{{ csrf_token() }}';

    function del(route) {
        const myModal = new bootstrap.Modal('#myModal', {})
        const modalToggle = document.getElementById('myModal')

        myModal.show(modalToggle);
        document.getElementById('deleteBtn').onclick = () =>{
            fetch(route,{
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                credentials: "same-origin",
            }).then(result =>{
                if(result.ok){
                    location.reload();
                }else{
                    myModal.hide();
                    location.reload();
                }
            })
        }

    }

</script>
