<?php

/**
 * Description of track
 *
 * @author Anh Vu
 */
// define('PARSE_SDK_DIR', './Parse/');
require 'vendor/autoload.php';

// Add the "use" declarations where you'll be using the classes
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;

class Track extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();

//         Init parse: app_id, rest_key, master_key
        ParseClient::initialize($this->config->item('app_id'), $this->config->item('rest_key'), $this->config->item('master_key'));
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   index
     * @todo    Shows the list card
     * @params
     *
     * @return  array
     *
     */
    public function index() {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $results = $this->prepare_for_save_update($data_post);
            exit(json_encode($results));
        }
        // $this->getInfoForView();
       $this->getInfoForView_Parse();
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   getInfoForView
     * @todo    get info for View
     * @params
     *
     * @return  array
     *
     */
    public function getInfoForView() {
        $this->load->Model("mtrack");
        $results = $this->mtrack->getFirst($this->getCurrentKey());
        $data_default = array();
        if (empty($results)) {
            $data_default = $this->getDataDefault();
        }
        $data['id'] = isset($results->id) ? $results->id : '';
        $data['key'] = isset($results->key) ? $results->key : '';
        $data['days_in_month'] = isset($results->info) ? json_decode($results->info, TRUE) : $data_default;
        $this->load->view('track/index', $data);
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   getInfoForView_Parse
     * @todo    get info for View
     * @params
     *
     * @return  array
     *
     */
    public function getInfoForView_Parse() {
        $query = new ParseQuery($this->config->item('class'));
        $query->equalTo("key", $this->getCurrentKey());
        $results = $query->first();
        $data_default = array();
        if (empty($results)) {
            $data_default = $this->getDataDefault();
        }
        $data['id'] = empty($results) ? '' : $results->getObjectId();
        $data['key'] = empty($results) ? '' : $results->get('key');
        $data['days_in_month'] = empty($results) ? $data_default : json_decode($results->get('info'), TRUE);
        $this->load->view('track/index', $data);
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   getDataDefault
     * @todo    get data default for view
     * @params
     *
     * @return  array
     *
     */
    public function getDataDefault() {
        $results = array();
        $current_date = getdate();
        $year = $current_date['year'];
        $month = $current_date['mon'];
        $total_day_of_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($i = 1; $i <= $total_day_of_month; $i++) {
            $results[$i]['column-header'] = jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $i, $year), 1);
            $results[$i]['column-data'] = array();
        }
        return $results;
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   prepare_for_save_update
     * @todo    prepate data for save/update
     * @params  array data
     *
     * @return  True/False
     *
     */
    public function prepare_for_save_update($data) {
        $list_item = $data['list_item'];
        $id = $data['id'];
        $key = empty($id) ? $this->getCurrentKey() : $data['key'];
        $data_default = $this->getDataDefault();
        foreach ($list_item as $k => $value) {
            $data_default[$k]['column-data'] = $value;
        }

        $data_save = array();
        $data_save['key'] = $key;
        $data_save['info'] = json_encode($data_default);
        $this->load->Model("mtrack");
        if (empty($id)) {
           return $this->save_on_parse($data_save);
            // return $this->mtrack->save($data_save);
        } else {
           return $this->update_on_parse($id, $data_save);
            // return $this->mtrack->update($id, $data_save);
        }
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   getCurrentKey
     * @todo    get current key base on current month & year
     * @params  
     *
     * @return  (int)key
     *
     */
    public function getCurrentKey() {
        $current_date = getdate();
        return (int) ($current_date['mon'] . $current_date['year']);
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   save_on_parse
     * @todo    save data to parse.com
     * @params  array data
     *
     * @return  True/False
     *
     */
    public function save_on_parse($data) {
        $obj_Tracks = ParseObject::create($this->config->item('class'));
        $obj_Tracks->set("key", $data['key']);
        $obj_Tracks->set("info", $data['info']);
        try {
            $obj_Tracks->save();
            $results['id'] = $obj_Tracks->getObjectId();
            $results['key'] = $obj_Tracks->get('key');
            $results['action'] = 'save';
            return $results;
        } catch (ParseException $ex) {
            return FALSE;
        }
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   update_on_parse
     * @todo    update data to parse.com
     * @params  array data
     *
     * @return  True/False
     *
     */
    public function update_on_parse($id, $data) {
        $query = new ParseQuery($this->config->item('class'));
        $query->equalTo("objectId", $id);
        $obj_Tracks = $query->first();
        $obj_Tracks->set("key", (int) $data['key']);
        $obj_Tracks->set("info", $data['info']);
        try {
            $obj_Tracks->save();
            $results['action'] = 'update';
            return $results;
        } catch (ParseException $ex) {
            return FALSE;
        }
    }

}
