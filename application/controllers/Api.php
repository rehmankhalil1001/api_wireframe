<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

class Api extends RestController
{

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {

        parent::__construct();

        $this->load->database();

        $this->postgre_realtor = $this->load->database('postgre_realtor', TRUE);

        $this->load->model('data_model');
    }

    /**
     * 
     *
     * @return 
     */
    public function realtors_get()
    {
        try {

            $name = $this->input->get('name');

            $limit = $this->input->get('limit') ? $this->input->get('limit') : '1';

            $offset = $this->input->get('offset') ? $this->input->get('offset') : '0';

            $api_key = $this->input->get_request_header('X-API-KEY');

            $result = array('status' => 1, 'data' => array('variable' => 1));

            $this->response($result, RestController::HTTP_OK);
        } catch (Exception $exc) {

            $this->response(array('error' => $exc), RestController::HTTP_INTERNAL_ERROR);
        }
    }


    /**
     * Get sales data.
     *
     * @return total, realtors data
     */
    public function sales_post()
    {
        try {

            $variable = trim($this->input->post('post_variable_name'));

            if (empty($variable)) {

                $this->response(array('error' => 'incorrect parameters'), RestController::HTTP_BAD_REQUEST);
            }

            // $limit =$this->input->get('limit')?$this->input->get('limit'):'100';

            // $offset =$this->input->get('offset')?$this->input->get('offset'):'0';

            if (!empty($variable)) {

                //call model to fetch data or implement business logic
                $query_result = array('data' => 'value');
            }
            if ($total = count($query_result) > 0) {
                $result['status'] = 'Data Found';
            } else {
                $result['status'] = 'No Data Found';
            }
            $result['data']['total'] = $total;
            $result['data']['values'] = $query_result;

            $this->response($result, RestController::HTTP_OK);
        } catch (Exception $exc) {

            $this->response(array('error' => $exc), RestController::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    // public function index_post()
    // {
    //     $input = $this->input->post();
    //     $this->db->insert('items',$input);

    //     $this->response(['Item created successfully.'], RestController::HTTP_OK);
    // } 

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    // public function index_put($id)
    // {
    //     $input = $this->put();
    //     $this->db->update('items', $input, array('id'=>$id));

    //     $this->response(['Item updated successfully.'], RestController::HTTP_OK);
    // }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    // public function index_delete($id)
    // {
    //     $this->db->delete('items', array('id'=>$id));

    //     $this->response(['Item deleted successfully.'], RestController::HTTP_OK);
    // }

}
