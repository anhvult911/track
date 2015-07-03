<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('card')) {

    function card_item_template() {
        $card = "";
        $card.= "<div class='hidden' data-card-template data-container='body' data-toggle='modal' data-target=''>";
        $card.="<div class='item ui-sortable-handle' data-card data-toggle='popover' data-trigger='hover' data-original-title='' data-content=''>";
        $card.="<span class = 'label label-info'></span></div></div>";
        return $card;
    }

    function card_modal_template($title,$btn_save,$btn_cancel) {
        $modal = "";
        $modal.="<div class='modal fade' data-modal-card-template id='' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        $modal.="<div class='modal-dialog' role='document'>";
        $modal.= "<div class='modal-content'>";
        $modal.= "<div class='modal-header'>";
        $modal.= "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $modal.= "<h4 class='modal-title' id='myModalLabel'>$title</h4>";
        $modal.= "</div>";
        $modal.= "<div class='modal-body'>";
        $modal.= "<textarea class='form-control' rows='10' id=''></textarea>";
        $modal.= "</div>";
        $modal.= "<div class='modal-footer hd-modal-footer'>";
        $modal.= "<button type='button' class='btn btn-primary' data-id='' data-button='save-card'>$btn_save</button>";
        $modal.= "<button type='button' class='btn btn-default button-cancel' data-id='' data-dismiss='modal'>$btn_cancel</button>";
        $modal.= "</div></div></div></div>";
        return $modal;
    }

}