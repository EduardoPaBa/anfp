<div id="DeleteModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-danger">Eliminar Informe Financiero</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> {{-- Botón para cerrar el modal --}}
                </div>
                <div class="modal-body"> {{-- Body del modal --}}
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <p class="text-center text-dark"><i class="fas fa-exclamation-triangle text-danger" style="font-size: 30px"></i> ¿Está seguro que desea eliminar este elemento?</p>
                </div> {{-- Fin body modal --}}
                <div class="modal-footer"> {{-- Footer del modal --}}
                    <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Si, eliminar</button>
                    </center>
                </div> {{-- Fin footer modal --}}
            </div>
        </form>
    </div>
</div>
