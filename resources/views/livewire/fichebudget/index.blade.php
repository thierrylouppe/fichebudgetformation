<div>
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Nouvelle fiche budget</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
    
        <div class="container-fluid">
        
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formule de création de nouvelle fiche de buget</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="text" class="col-sm-5 col-form-label">Selectionner la direction</label>
                                        <select class="custom-select" name="status" wire:model="selectDirection">
                                            <option></option>
                                            @foreach($directions as $direction)
                                            <option value="{{ $direction->id}}">{{ $direction->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @if($selectDirection != "")
                            <div class="row">
                                <div class="col-8 ">
                                    <table class="table table-bordered table-hover dataTable dtr-inline">
                                        <thead>
                                            <th>N°</th>
                                            <th>Action</th>
                                            <th><button class="btn btn-primary" wire:click="newAction"><i class="fas fa-plus-circle mr-2"></i> Ajouter</button></th>
                                        </thead>
                                        <tbody>
                                            @forelse($tableauActions as $action)
                                            <tr>
                                                <td>{{ $loop->index + 1}}</td>
                                                <td style="width:70%;">{{$action->nom}}</td>
                                                <td>
                                                    <button class="btn btn-primary mr-2"><i class="fas fa-arrow-right"></i></button>
                                                    <button class="btn btn-primary" wire:click="showActionDetails('{{$action->id}}')"><i class="fas fa-eye"></i></button>

                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3">
                                                <div class="alert alert-info alert-dismissible">
                                                    <h5><i class="icon fas fa-info"></i> Information!</h5>
                                                    Cette direction ne comporte aucune action pour le moment.
                                                </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{$tableauActions->links()}}
                                </div>
                            </div>
                            @endif

                            @if($showNewActionForm)
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Création Action</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="d-flex">
                                                    <div class="form-group mr-2">
                                                        <label for="actionName">Nom de l'action</label>
                                                        <input type="text" class="form-control" id="actionName">
                                                    </div>
                                                    <div class="form-group mr-2">
                                                        <label for="actionBudget">Budget</label>
                                                        <input type="text" class="form-control" id="actionBudget">
                                                    </div>
                                                    <div class="form-group mr-2">
                                                        <label for="actionName">Date début</label>
                                                        <input type="text" class="form-control" id="actionName">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="actionBudget">Date fin</label>
                                                        <input type="text" class="form-control" id="actionBudget">
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="form-group mr-2">
                                                        <label for="actionName">Objectifs</label>
                                                        <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="actionBudget">Impact</label>
                                                        <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn btn-success">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Ajouter les étapes</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <h1>RTY</h1>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col -->
                            </div>
                            @endif


                        </div>



                    </div>
                </div>
            </div>
        </div>

        @if($actionShow != null && $actionEditForm ==false)
            @include("livewire.fichebudget.modalshow")
        @endif

        @if($actionShow != null && $actionEditForm == true)
            @include("livewire.fichebudget.modaledit")
        @endif

    </div>

        
</div>

<style>

</style>

<script>
    window.addEventListener('showActionDetails', event => {
       

        $("#showActionDetailModal").modal({
            backdrop: false,
            focus: true
        })
    })

    window.addEventListener('showActionEdit', event => {
       
        $("#showActionDetailModal").modal({
            show: false
        })

       $("#showActionEditModal").modal({
           backdrop: false,
           focus: true
       })
   })

   window.addEventListener('closeActionEdit', event => {
       

      $("#showActionEditModal").modal({
          show: false
      })
  })

  window.addEventListener('ShowEditToast', event =>{


    Toast.fire({
        icon: 'success',
        title: 'Action mis à jour avec succès!'
    })
  })
</script>