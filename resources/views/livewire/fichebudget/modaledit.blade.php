<div class="modal fade" id="showActionEditModal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Consultation</h4>
            </div>
            <form wire:submit.prevent="updateAction">
                <div class="modal-body">

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label for="">Direction</label>
                            <select class="form-control @error('actionDirectionEdit') is-invalid @enderror" name="status" wire:model="actionDirectionEdit" >
                                <option></option>
                                @foreach($directions as $direction)
                                <option value="{{ $direction->id}}">{{ $direction->libelle}}</option>
                                @endforeach
                            </select>
                            @error('actionDirectionEdit')
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Action</label>
                            <input class="form-control @error('actionNomEdit') is-invalid @enderror"  type="text" wire:model="actionNomEdit" >
                            @error('actionNomEdit') 
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Responsable</label>
                            <select class="custom-select @error('actionResponsableEdit') is-invalid @enderror" name="status" wire:model="actionResponsableEdit">
                                <option></option>
                                @foreach($users as $user)
                                    @if($user->id == $actionShow->user->id)
                                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('actionResponsableEdit')
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                            
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex ">
                        <div class="form-group " style="width:50%;">
                            <label for="">Objectifs de l'action</label>
                            <textarea name="" id="" wire:model="actionObjectifEdit" cols="20" required rows="5" class="form-control @error('actionObjectifEdit') is-invalid @enderror">
                            
                            </textarea>
                            @error('actionObjectifEdit')
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group ml-2 " style="width:50%;">
                            <label for="">Impact de l'action</label>
                            <textarea name="" id="" wire:model="actionImpactEdit" cols="20" rows="5" required class="form-control @error('actionImpactEdit') is-invalid @enderror">
                           
                            </textarea>
                            @error('actionImpactEdit')
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="modal-footer justify-content-right">
                    <button type="button" class="btn btn-danger" wire:click="closeEditModal">Fermer</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Valider</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>