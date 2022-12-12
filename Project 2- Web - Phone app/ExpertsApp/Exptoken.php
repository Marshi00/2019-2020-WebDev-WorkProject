<?php
if (
    $A->SetEmpty('token') &&
    $A->SetEmpty('appVersion') &&
    $A->SetEmpty('devise')
){
    $devise = $A->RealString($_POST['devise']);
    $appVersion = $A->RealString($_POST['appVersion']);
    $token = $A->RealString($_POST['token']);
    $select2=$A->Query("SELECT * FROM versioncheck WHERE appVersion='$appVersion' AND devise='$devise'");
    if ($A->Numros($select2)==1){
        $token = substr($token,0,+6);
        $token=$A->hash2($token);
        $Select=$A->Query("SELECT * FROM workers WHERE token='$token'");
        if ($A->Numros($Select)==1) {
            $S = $A->FetchAssoc($Select);
            $appExp=$S['id'];
        }
        else{
            $Note=array('error'=>true,'login'=>false);
            echo json_encode($Note);
            return;
        }
    }
    else{
        $A->MSG('ورژن برنامه نا معتبر است ، لطفا آپدیت کنید.');
        return;
    }
}
else{
    $Note=array('error'=>true,'login'=>false);
    echo json_encode($Note);
    return;
}