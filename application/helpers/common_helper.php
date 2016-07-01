<?php

function ajax_response($s, $m, $d = array()) {
    header('Content-type: application/json');
    echo json_encode(array('status' => $s, 'msg' => $m, 'data' => $d));
    exit;
}

function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function prd($data) {
    pr($data);
    die;
}

function get_loader($type = '', $size = FALSE) {
    $loader = '<i class="fa fa-spin';
    switch ($type) {
        case 'spinner':
            $loader .= ' fa-spinner';
            break;
        default:
            $loader .= ' fa-spinner';
    }
    if ($size) {
        switch ($size) {
            case '2x':
                $loader .= ' fa-2x';
                break;
            case 'bg':
                $loader .= ' fa-bg';
                break;
        }
    }
    $loader .= '"></i>';
    return $loader;
}

