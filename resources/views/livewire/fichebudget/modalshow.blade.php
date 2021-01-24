<div class="modal fade" id="showActionDetailModal">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Consultation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form>
    <div class="modal-body">
        
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <label for="">Direction</label>
                    <p>{{ $actionShow->direction->libelle }}</p>
                </div>
                <div class="form-group">
                    <label for="">Action</label>
                    <p>{{ $actionShow->nom }}</p>
                </div>
                <div class="form-group">
                    <label for="">Responsable</label>
                    <p>{{ $actionShow->user->name }}</p>
                </div>
            </div>
            <hr>
            <div class="d-flex ">
                <div class="form-group" style="width:50%;">
                    <label for="">Objectifs de l'action</label>
                    <p>{{ $actionShow->objectif }}</p>
                </div>
                <div class="form-group" style="width:50%;">
                    <label for="">Impact de l'action</label>
                    <p>{{ $actionShow->impact }}</p>
                </div>
            </div>
        
    </div>

    <div class="modal-footer justify-content-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" wire:click="showActionEdit"><i class="far fa-edit"></i> Modifier</button>
    </div>
    </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> 