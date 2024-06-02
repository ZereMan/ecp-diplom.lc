<!-- Жаңа лауазым қосу MODAL -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Жаңа лауазым қосу</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="positions_add.php">
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Сипаттама</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="max_vote" class="col-sm-3 control-label">Ең көп дауыс</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="max_vote" name="max_vote" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Жабу</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Сақтау</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Лауазымды өзгерту MODAL -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Лауазымды өзгерту</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="positions_edit.php">
                    <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="edit_description" class="col-sm-3 control-label">Сипаттама</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_description" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_max_vote" class="col-sm-3 control-label">Ең көп дауыс</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="edit_max_vote" name="max_vote">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Жабу</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Жаңарту</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Лауазымды жою MODAL -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Жоюды растау</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="positions_delete.php">
                    <input type="hidden" class="id" name="id">
                    <div class="text-center">
                        <p>Бұл лауазымды жоюды шын мәнінде қалайсыз ба?</p>
                        <h2 class="bold description"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Болдырмау</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Жою</button>
                </form>
            </div>
        </div>
    </div>
</div>
