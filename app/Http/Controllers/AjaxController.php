<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
       protected function ajax(){
        echo "Helo";
       }


        // ajax function.
    public function mc_ajax_brochuresearch_handler() {
        // Make your response and echo it.
        $authorid = $_POST['data']['page_author_id'];
        $searchfilter = $_POST['data']['search-filter'];
        $this->access_token = get_user_meta( $authorid, 'access_token', true);
        $email_message = get_user_meta( $authorid, 'email_message', true);

        $query_endpoint = "https://datacenter.medinformer.co.za/api/brochure-search";

        $postvars = array();
        /*$brochure_id = ($_POST['miapi_brochure_id'] != '')? $_POST['miapi_brochure_id']: false;
        if($brochure_id):
            $postvars['brochure_id'] = $brochure_id;
        endif;*/
        $brochure_search = ($_POST['data']['brochure_search'] != '')? $_POST['data']['brochure_search']: false;
        if($brochure_search):
            if($searchfilter == 'search'){
                $postvars['search'] = $brochure_search;
            }
            if($searchfilter == 'icd10'){
                $postvars['icd10'] = $brochure_search;
            }
        endif;
        /*$icd10 = ($_POST['miapi_icd10'] != '')? $_POST['miapi_icd10']: false;
        if($icd10):
            $postvars['icd10'] = $icd10;
        endif;*/
        if(count($postvars) == 0) $postvars = false;

            $results = json_decode($this->queryapi($query_endpoint, $postvars, $this->access_token));

            ?>

            <?php if(isset($results)): ?>
            <div class='brochurelisting-tools'>
                <div class='backtobrochures'>
                    <span class='back-icon'><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-8" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M231.293 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L70.393 256 251.092 74.87c4.686-4.686 4.686-12.284 0-16.971L231.293 38.1c-4.686-4.686-12.284-4.686-16.971 0L4.908 247.515c-4.686 4.686-4.686 12.284 0 16.971L214.322 473.9c4.687 4.686 12.285 4.686 16.971-.001z"></path></svg></span>
                    <span>Search Again</span>
                </div>
                
                
                <div class='brochurecount'>
                    <div class='brochurecount-label'>Brochures:</div>
                    <div class='brochurecount-icon'>
                        <span class='back-icon'><svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="book-open" class="svg-inline--fa fa-book-open fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><g class="fa-group"><path class="fa-secondary" fill="currentColor" d="M576 62.75v337.84c0 16.23-13.13 29.77-30 30.66-49.47 2.6-149.52 12.1-218.7 46.92-10.65 5.36-23.28-1.94-23.28-13.49V100.81a15.37 15.37 0 0 1 7.27-13.17c67.24-41.16 176.16-52.48 231-55.59C560.64 31 576 45 576 62.75z" opacity="0.4"></path><path class="fa-primary" fill="currentColor" d="M264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31 0 45 0 62.75V400.6c0 16.24 13.13 29.78 30 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63a15.05 15.05 0 0 0-7.25-12.99z"></path></g></svg></span>
                        <span><strong><?= count($results); ?></strong></span>
                    </div>
                </div>
            </div>
            
            <?php $this->showResultsHTML($results, $authorid); ?>

        <?php else: ?>
            <div class='no-results'> - <i>No results found for <strong>'<?= $_POST['brochure_search']; ?>'</strong>, please try again. </i></div>
        <?php endif; ?>

        <?php
        // Don't forget to stop execution afterward.
        wp_die();
    }



}
