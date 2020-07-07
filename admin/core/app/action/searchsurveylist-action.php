<?php

/**
 *  short summary.
 *
 *  description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
$result = SurveylistsData::getAllNumRowToListByRange($_GET['start_at'], $_GET['finish_at']);

if (count($result) > 0) {
    $ar = array();
    foreach ($result as $value) {
        
        $u = UserData::getById($value->user_id);
        $us = UserData::getById(Session::getUID());
        $delUrl = "delsurveylist";
        $onclick = "onclick='md.showSwal(\"warning-message-and-confirmation-delete\",\"" . $value->id . "\", \"" . $delUrl . "\")'";
        $editHref ='./?view=admineditsurveylist&id=' . $value->id ;
        $seeHref ='./?view=adminsurveystadistics&surveyid=' . $value->id ;
        $delHref = ($us->user_level) ? './?action=delsurveylist&cid=' . $value->id . '&ep=' . $value->name  : '';
        $btnAction = '<div class="btn-group"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
        <div class="dropdown-menu animated rubberBand" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
        <a class="dropdown-item" href="'.$seeHref.'"><i class="ti-eye"></i> See stats</a>    
        <a class="dropdown-item" href="'.$editHref.'"><i class="ti-pencil-alt"></i> Edit</a>
            <a class="dropdown-item" href="'.$delHref.'"><i class="ti-trash"></i> Delete</a>
           
        </div></div>';
        $btnPrint = '<a onclick="openWindowsPrint(\'./?view=printsurveylist&nep=' . $value->name . '&anho=' . $value->name . '&idcp=' . $value->id . '&surveylists_id=' . $value->id . '\')"
                     data-toggle="tooltip" title="Imprimir lista de chequeo" class="btn btn-link btn-info btn-just-icon btn-sm"><i class="material-icons">print</i> </a> <input type="hidden" name="id" id="id" value="' . $value->name . '" />';
        $ar[] = array(
            'name' => $value->name,
            'description' => $value->description,
            'created_at' => $value->created_at,
            'user_id' => $u->name,
            'surveylist_status' => $value->surveylist_status,
            'options' =>  $btnAction
        );
    }
    echo json_encode($ar);
}else{
    $ar[] = array(
        'name' => "-",
        'description' => "-",
        'created_at' => "-",
        'user_id' => "-",
        'surveylist_status' => "-",
        'options' =>  "-"
    );
    echo json_encode($ar);

}
