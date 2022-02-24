@extends('layouts.app')
<style type="text/css">

</style>
@section('content')



<div style="background: #1E78A9;"  class="mt-5 alert alert-dismissible fade show" role="alert" >


    <div class="container-fluid welcome-message" style="background: #1E78A9;">
            <div class="d-lg-flex justify-content-between align-items-center">
              <div class="pr-5 image-border"><img src="https://www.bootstrapdash.com/demo/wagondash/template/images/dashboard/welcome.png" alt="welcome"></div>
              <div class="pl-4">
                <h2 class="text-white font-weight-bold mb-3">Welcome to Medinformer</h2>
                <p class="pb-0 mb-1">Congratulations! Your account has been setup and you are ready to configure your dashboard now.</p>
                <p>Configuration only take a couple of seconds.</p>
              </div>
              <div class="pl-4">
                <button type="button" class="btn btn-primary" id="skip-mesages" type="button" class="close" data-dismiss="alert" aria-label="Close">Skip</button>
                <button type="button" class="btn btn-success ml-lg-0 ml-xl-2 ml-2 ml-l mt-lg-2 mt-xl-0">Setup Manually</button>
              </div>
            </div>



</div>


</div>


<div id='brochure-search-page' class='container-fluid mt-5 pt-5'>
    
<form action='' method="post" id='searchbrochuresform'>
                    <div id='medclient-portfolios-search' class='medclient-search'>
                        <input type='hidden' name='page_author_id' value='medinformer'>
                        <input type='text' name='brochure_search' placeholder='Search by Keyword, ICD-10 code or health area.' value='<?php if(isset($_POST['brochure_search'])): echo $_POST['brochure_search']; endif; ?>' required>
                        <button type='submit' name='brochure_search_button' class='brochure_search_button' value='Search'>
                            <span class='button-text mc-animate'>Search</span>
                            <span class='button-loading mc-animate'>
                                <div class="ld ld-hourglass ld-spin"></div>
                            </span>
                        </button>

                        <div class='medclient-search-filters' style='display:none;'>
                            <div><input type='radio' name='search-filter' value='search' checked> Brochure Search</div>
                            <div><input type='radio' name='search-filter' value='icd10'> ICD10 Search</div>
                        </div>
                    </div>
                </form>
                
                <div class='brochure-collection'>
                    <div class='brochure-collection-label'>Selected Brochures:</div>
                    <div class='brochure-collection-items'>
                        <div class='no-results'><i>Select the brochures you would like to email.</i></div>
                    </div>
                </div>
                <div class='brochure-collection-button'>
                    <button type="submit" name="brochure_email_button" class="brochure_email_button">
                        <span class="button-text mc-animate">Email Collection</span>
                    </button>
                    <button type="submit" name="brochure_sms_button" class="brochure_sms_button">
                        <span class="button-text mc-animate">SMS Collection</span>
                    </button>
                </div>

                 <div class='email-collection'>
                    <form action='' method="post" id='emailbrochuresform'>
                        <input type='hidden' class='brochure_ids' name='hids' value=''>
                        <input type='hidden' class='data_post' name='data_post' value=''>
                        <input type='hidden' class='data_content' name='data_content' value=''>
                        <input type='hidden' class='data_href' name='data_href' value=''>
                        <input type='hidden' name='page_author_id' value='Tapiwa'>
                        
                        <div class='formfields'>

                            <?php
                            $author_fname = "Tapiwa";
                            $author_lname = "Mavhunga";
                            $doctor_name = $author_fname.' '.$author_lname;
                            $branch_name = "Cipla";
                            ?>
                            
                            <div class='formfield mt-4'>
                                <label class='formfield-label mc-animate <?= ($doctor_name != ' ')? 'mcshrink':''; ?>'>Your name (senders/users name):</label>
                                <input type="text" name="doctor_name" value="<?= $doctor_name; ?>" required>
                            </div>
                            <div class='formfield'>
                                <label class='formfield-label mc-animate'>Email To:</label>
                                <input type="text" name="patient_email" required>
                            </div>
                          
                            <div class='formfield'>
                                <textarea name='doctor_diagnosis' id="emailwTextarea" >
                                </textarea>
                            </div>


                            <div class='formfield' style='text-align: right;'>
                                <span>I have permission to send information to this email address.</span> <input type='checkbox' name='patient_concent' required> 
                            </div>
                            <div class='formfield nopadding'>
                                <button type="submit" class='et_pb_button' name="email_patient_submit" value="Email now" style="background: #1E78A9;
color: #fff !important;">Email now</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class='sms-collection'>
                    <form action='' method="post" id='smsbrochuresform'>
                        <input type='hidden' class='brochure_ids' name='hids' value=''>
                        <input type='hidden' class='postscript_passcode' name='postscript_passcode' value=''>
                        <input type='hidden' class='postscript' name='postscript' value=''>
                        <input type='hidden' class='data_href' name='data_href' value=''>
                        <input type='hidden' name='page_author_id' value='Tapiwa'>

                        <div class='formfields'>
                            <?php
                            $author_fname = "Tapiwa";
                            $author_lname = "Mavhunga";
                            $doctor_name = $author_fname.' '.$author_lname;
                            ?>
                            <div class='formfield'>
                                <label class='formfield-label mc-animate <?= ($doctor_name != ' ')? 'mcshrink':''; ?>'>Your name (senders/users name):</label>
                                <input type="text" name="doctor_name" value="Tapiwa" required>
                            </div>
                            <div class='formfield'>
                                <label class='formfield-label mc-animate'>Mobile Number:</label>
                                <input type="text" name="msidn" value="" required>
                            </div>
                         
                            <input type='hidden' name='doctor_diagnosis' value=''>
                          

                             <div class='formfield' style='text-align: right;'>
                                <span>I have permission to send information to this mobile number.</span> <input type='checkbox' name='patient_concent' required> 
                            </div>

                            
                            <div class='formfield nopadding'>
                                <button type="submit" class='et_pb_button' name="sms_submit">SMS Now</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class='brochure-searchpage-results'>
                    <div class='no-results'> - <i>Search for Medinformer medical brochures in field provided above or select a brochure below.</i></div>
                </div>


                <div class='listing-group'>

                    <div class='listing-group-filter'>
                        <div class='listing-group-filter-label'>View: </div>
                        <div class='listing-group-filter-select'>
                        <select class='formitem'>

                            <option value='0'>Brochure List</option>
                            <option value='1'>Category List</option>
                            <option value='2'>Post Scripts</option>
                        </select>
                        </div>
                    </div>

                    <style>
                      #s_525, #s_240, #s_485, #s_516{
                        display:  none;
                      }
                    </style>

                  <div class='brochure-groups'>


<?php 

if( $result ) { ?>    
    <div id="alphabetical-posts">
      <?php $letters = array_keys($result); ?>
      <?php if( $letters ) { ?>
        <div class="letters-wrap mt-5 mb-5">
          <ul class="letters">          
            <?php foreach( $letters as $key => $letter ) { ?>
              <li><a href="#goto-letter-<?php echo $letter; ?>"><?php echo $letter; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>

      <div class="brochure-groups">
      <div class="posts row row-cols-lg-4 row-cols-md-2 row-cols-1 max-mb-n30">
        <?php foreach( $result as $letter => $posts ) { ?>
          <div id="goto-letter-<?php echo $letter; ?>" class="item">
            <h3><?php echo $letter; ?></h3>
            <div class="list brochure-items">
              <?php foreach( $posts as $key => $post ) { ?>
                <div class="col">
                    <div class='brochure-item mc-animate' data-bid='<?= $post['ID'] ?>' id="s_<?= $post['ID'] ?>"><a><?php echo $post['title']; ?></a></div>

                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    </div>
  <?php } ?>

<!-- End -->

</div>

  <div class='brochure-categories'>

    @foreach($categories as $category)

                <div class='brochure-category' data-id='{{ $category->term_id }}'>
                  <div class='brochure-category-image' style='background-image:url("{{$category->image}}")' id="s_{{ $category->term_id }}"></div>
                  <div class='brochure-category-details'>
                    <h2>{{$category->name}}</h2>

<?php  $category->image; ?>                  </div>
                </div>  
        @endforeach

  </div>

  



  <div class='brochure-postscripts'>
      post scripts load here...
  </div>


</div>




<!-- End  -->

   <div class='brochure-email-loading'>
                    <div id='brochure-email-loading-text'>Sending email...</div>
                    <div id='brochure-email-loading-icon' class='ld ld-slide-ltr'>
                        <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="paper-plane" class="svg-inline--fa fa-paper-plane fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><g class="fa-group"><path class="fa-secondary" fill="currentColor" d="M245.53 410.5l-75 92.83c-14 17.1-42.5 7.8-42.5-15.8V358l280.26-252.77c5.5-4.9 13.3 2.6 8.6 8.3L191.72 387.87z" opacity="0.4"></path><path class="fa-primary" fill="currentColor" d="M511.59 28l-72 432a24.07 24.07 0 0 1-33 18.2l-214.87-90.33 225.17-274.34c4.7-5.7-3.1-13.2-8.6-8.3L128 358 14.69 313.83a24 24 0 0 1-2.2-43.2L476 3.23c17.29-10 39 4.6 35.59 24.77z"></path></g></svg>
                    </div>
                </div>

                <div class='brochure-sms-loading'>
                    <div id='brochure-sms-loading-text'>Sending SMS...</div>
                    <div id='brochure-sms-loading-icon' class='ld ld-slide-ltr'>
                        <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="mobile" class="svg-inline--fa fa-mobile fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><g class="fa-group"><path class="fa-secondary" fill="currentColor" d="M0 384v80a48 48 0 0 0 48 48h224a48 48 0 0 0 48-48v-80zm160 96a32 32 0 1 1 32-32 32 32 0 0 1-32 32z" opacity="0.4"></path><path class="fa-primary" fill="currentColor" d="M0 384V48A48 48 0 0 1 48 0h224a48 48 0 0 1 48 48v336z"></path></g></svg>
                    </div>
                </div>

  

  <div id='brochure-categories-page'>
                    <div class='brochure-categories-loading'>
                        <span class='ajax-loading mc-animate'>
                            <div class="ld ld-hourglass ld-spin"></div>
                        </span>
                        <span class='ajax-loading-text'><i>- Loading category brochures, please wait...</i></span>
                    </div>
                    <div class='brochure-categories-results'></div>
                </div>




</div>




</div>




@endsection
