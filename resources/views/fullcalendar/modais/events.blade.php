<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="message"></div>
                    <form id="formEvent">
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Titulo</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" id="title">
                                <input type="hidden" name="id">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="room" class="col-sm-4 col-form-label">Sala</label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-sm-8" name="room" id="room">
                                    <option value="1">Sala 1</option>
                                    <option value="2">Sala 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-sm-4 col-form-label">Data/hora Inicial</label>
                            <div class="col-sm-8">
                                <input type="text" name="start" class="form-control date-time" id="start">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Data/hora Final</label>
                            <div class="col-sm-8">
                                <input type="text" name="end" class="form-control date-time" id="end">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-sm-4 col-form-label">Cor do Evento</label>
                            <div class="col-sm-8">
                                <input type="color" name="color" class="form-control" id="color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Estado da reunião</label>
                            <div class="col-sm-8">
                                <input readOnly = "true" type="text" name="condition" value = "Reunião agendada" class="form-control" id="condition">
                            </div>

                        <div class="form-group row">
                            <label for="participants_id" class="col-sm-4 col-form-label">Participantes</label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-sm-8" name="participants_id" id="participants_id">
                                    <option value="1">Participante 1</option>
                                    <option value="2">Participante 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Descrição</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="description" cols="40" rows="4"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger deleteEvent">Excluir</button>
                <button type="button" class="btn btn-primary saveEvent">Salvar</button>
            </div>
        </div>
    </div>
</div>

