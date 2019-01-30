<?php

/**
 * searchescrituras_action short summary.
 *
 * searchescrituras_action description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
//if(count($_POST)>0){
$benefiCreated = SurveylistsanswerData::getByRange($_GET['start_at'], $_GET['finish_at']);
if (count($benefiCreated)>0) {
    # code...
    $ar = array();
    foreach ($benefiCreated as $value) {
        $u = UserData::getById($value->user_id);
        $us = UserData::getById(Session::getUID());
        $userDelivered = UserData::getById($value->user_id_delivered);
        $is_delivered = ($value->is_delivered == "1") ? 'checked': '';
        $btnDel = ($us->is_admin)?'<a href="./?action=delbeneficencia&id='.$value->id.'" data-toggle="tooltip" title="Eliminar" class="btn btn-link btn-danger btn-just-icon btn-sm"> <i class="material-icons">delete</i></a>':'';
        $modal = ' <!-- Classic Modal -->
                        <div class="modal fade" id="myModal-'.$value->id.'"
                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Observación de la escritura publica : <b>'.$value->nroescriturapublica.'</b></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./?action=updatebeneficenciacomments" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="comments" class="bmd-label-floating">Observaciones</label>
                                                        <textarea name="comments" id="comments" class="form-control"
                                                            rows="3" cols="20" required>'.$value->comments.'</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-round">Enviar
                                                observaciones</button>
                                            <input type="hidden" name="id" id="id" value="'.$value->id.'" />
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  End Modal --> ';
        $btnModal = '<a href="" data-toggle="modal" data-target="#myModal-'.$value->id.'" data-toggle="tooltip" title="Agregar observaciones" class="btn btn-link btn-danger btn-just-icon btn-sm"><i class="material-icons">report_problem</i></a>';

        
        $ar[] = array('nroescriturapublica' => $value->comments!= "" ? $value->nroescriturapublica .'<a data-toggle="tooltip" title="'.$value->comments.'" class="btn btn-link btn-warning btn-just-icon btn-sm"><i class="material-icons">comment</i></a>':$value->nroescriturapublica ,
        'tipo'=>$value->tipo,
        'anho'=>$value->anho,
        'created_at'=>$value->created_at,
        'usuarioSolicitud'=>$u->name,
        'finished_at'=>$value->finished_at.$modal,
        'userDelivered'=>isset($userDelivered->name)? $userDelivered->name :'<strong style="color:red">--- En procesos ---</strong> ',
        'approvals'=>"<form action='./?action=updatedeliveredbeneficencia' method='post'><input class='' type='checkbox' name='is_delivered' id='is_delivered' value='0' ".$is_delivered." ><button type='submit' data-toggle='tooltip' title='Actualizar' class='btn btn-link btn-info btn-just-icon btn-sm'><i class='material-icons'>thumb_up_alt</i></button><input type='hidden' name='id' id='id' value='".$value->id."' /> </form>",
        'options'=>'<a href="./?view=editbeneficencia&id='.$value->id.'" data-toggle="tooltip" title="Editar" class="btn btn-link btn-success btn-just-icon btn-sm"><i class="material-icons">edit</i> </a>'.$btnDel.$btnModal
        );
    }
    echo json_encode($ar);
}