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
$result = ConsecutivosDeCertificadosData::getByRange($_GET['start_at'], $_GET['finish_at']);

if (count($result)>0) {
    # code...
    $ar = array();
    foreach ($result as $value) {
        $u = UserData::getById($value->user_id);
        $us = UserData::getById(Session::getUID());
        $btnDel = ($us->is_admin)?'<a href="./?action=delconsecutivosdecertificados&id='.$value->id.'" data-toggle="tooltip" title="Eliminar" class="btn btn-link btn-danger btn-just-icon btn-sm"> <i class="material-icons">delete</i></a>':'';
        $btnEdit = '<a href="./?view=editconsecutivosdecertificados&id='.$value->id.'" data-toggle="tooltip" title="Editar" class="btn btn-link btn-success btn-just-icon btn-sm"><i class="material-icons">edit</i> </a> ';
        $ar[] = array('consecutivo' => $value->consecutivo,
        'nroescriturapublica'=>$value->nroescriturapublica,
        'dateescritura'=>$value->dateescritura,
        'created_at'=>$value->created_at,
        'usuarioSolicitud'=>$u->name,
        'options'=>$btnEdit.$btnDel
        );
    }
    echo json_encode($ar);
}
