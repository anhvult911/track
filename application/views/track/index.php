<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo lang('track_title_page');?></title>         
        <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/bootstrap.min.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/font-awesome.min.css' />                   
        <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/track.css' />
    </head>
    <body>
        <div id="status-area"></div>
        <div id="horizontalDiv" class="wrap-table">
            <input type="hidden" id="id" value="<?php echo $id; ?>" readonly="readonly"/>
            <input type="hidden" id="key" value="<?php echo $key; ?>" readonly="readonly"/>
            <input type="hidden" id="base_url" value="<?php echo base_url(); ?>" readonly="readonly"/>
            <?php foreach ($days_in_month as $column => $val_column) { ?>
                <div class="list" data-list="<?php echo $column; ?>">
                    <div class="list-header">
                        <h2><?php echo $column; ?></h2>
                        <p data-header="<?php echo $val_column['column-header']; ?>"><?php echo $val_column['column-header']; ?></p>
                    </div>   
                    <div class="wrap-column">
                        <div id="sortable<?php echo $column; ?>" class="column">
                            <?php foreach ($val_column['column-data'] as $item => $val_item) { ?>
                                <div data-container="body" data-toggle="modal" data-target="#card-modal-<?php echo "$column-$item"; ?>">
                                    <div class="item" data-card="<?php echo "$column-$item"; ?>" data-original-title=""  data-content="<?php echo $val_item; ?>">
                                        <span  class="label label-info"><?php echo $item; ?></span>
                                    </div>
                                </div>                                                            
                            <?php } ?>      
                        </div><!--end sortable-->
                        <?php foreach ($val_column['column-data'] as $item => $val_item) { ?>                                                     
                            <!--Item Modal--> 
                            <div class="modal fade" id="card-modal-<?php echo "$column-$item"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo lang('track_title_popup');?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" rows="10" id="card-content-<?php echo $column; ?>"><?php echo $val_item; ?></textarea>
                                        </div>
                                        <div class="modal-footer hd-modal-footer">
                                            <button type="button" class="btn btn-primary" data-column="<?php echo $column; ?>"  data-button="save-card" data-id="<?php echo "$column-$item"; ?>"><?php echo lang('track_btn_save');?></button>
                                            <button type="button" class="btn btn-default button-cancel" data-column="<?php echo $column; ?>"  data-dismiss="modal" data-id="<?php echo "$column-$item"; ?>"><?php echo lang('track_btn_cancel');?></button>                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Item Modal-->
                        <?php } ?> 
                        <div class="column-footer">
                            <button class="btn-add-card" data-toggle="modal" data-target="#card-modal-<?php echo $column; ?>">
                                <span class="fa fa-plus" aria-hidden="true"></span>  <?php echo lang('track_btn_add_card');?>
                            </button>
                        </div> 
                    </div>
                </div>
                <!-- Modal Add/Edit-->
                <div class="modal fade" id="card-modal-<?php echo $column; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo lang('track_title_popup');?></h4>
                            </div>
                            <div class="modal-body">
                                <textarea class="form-control" rows="10" id="card-content-<?php echo $column; ?>"></textarea>
                            </div>
                            <div class="modal-footer hd-modal-footer">
                                <button type="button" class="btn btn-primary" data-column="<?php echo $column; ?>" data-id="" data-button="save-card"><?php echo lang('track_btn_save');?></button>
                                <button type="button" class="btn btn-default button-cancel" data-column="<?php echo $column; ?>" data-id="" data-dismiss="modal"><?php echo lang('track_btn_cancel');?></button>                        
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Add/Edit-->
            <?php } ?>                  
        </div>
        <?php
        $this->load->helper('item_card_helper');
        echo card_item_template();
        echo card_modal_template(lang('track_title_popup'),lang('track_btn_save'),lang('track_btn_cancel'));
        ?>
    </body>
</html>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch.js"></script>
<script src="<?php echo base_url(); ?>assets/js/track.js"></script>


