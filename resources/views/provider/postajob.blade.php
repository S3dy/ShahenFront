@extends('layouts.masterforfreelancer')
@section('title', 'My Jobs - rbs')
@section('header')
  @include('providerheader')
@endsection
@section('body')
<?php $a=Session::get('provider_id');?>
<div class="container  pagepad ">
 @if(session('flag'))
        @if(session('flag') == "1")<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">Congratulations!, Your job has been posted.</a>
</div>
 @else
<div class="alert alert-danger" role="alert">
  <a href="#" class="alert-link">Retry the job post</a>
</div>
 @endif

      @endif
  <div class="row">
    <div class="col-md-12">
        <h1 class="contact-h1 contact-m-bottom post-heading">Post a Job</h1>
        <form id="post_a_job" action="{{url('/')}}/jobpost" method="post">
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $a ?>">
        <div class="card card-block m-0 contact-cust-card">

            <h3 class="post-h3 contact-m-bottom">Describe the Job</h3>
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Name your job posting</label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <input class="post-input" type="textbox" name="jobname" id="post-name" placeholder="EXAMPLE: Need Help Developing a Powerpoint Presentation for a Family Reunion">
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="post-name-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Conform your category</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                
                    <select class="post-select" id="post-category" name="projectcategory">
                        <?php
                                  $obj=json_decode($users,true);             
                                  $f=sizeof($obj[0]['category']);
                                  $h=$f-1;
                                  for($i=0;$i<=$h;$i++)
                                  {
                                      $value=$obj[0]['category'][$i];
                                      echo "<option class='post-select' id='post-default$i'>$value</option>";     
                    
                                  }
                        ?>
                      <!-- <option class="post-select" id="post-default">Please select</option>
                      <option>Legal</option>
                      <option>Web, Mobile & Software Dev</option>
                      <option>It & Networking</option>
                      <option>Design & Creative</option>
                      <option>Writing</option> -->
                    </select>
                    
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="post-category-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            <!--<div class="row post-b-m-40">
              <div class="col-md-12">
                <label class="post-label offer-b-10">How many freelancers do you need to hire for this job?</label>
              </div>
              <div class="col-md-12 offer-row-top">
                <div class="row">
                  <div class="col-md-12">
                    <label class="post-check-text">
                      <input type="radio" checked="checked" name="free" value="I want to hire one freelancer" checked="checked">
                      I want to hire one freelancer
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio" value="I need to hire more than one freelancer" name="free">
                      I need to hire more than one freelancer
                    </label>
                  </div>
                </div>
              </div>
            </div>-->
            <input type = "hidden" name="hireone" value="I want to hire one freelancer" >
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">Enter skills needed (optional)</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                <div class="post-b-m-40">
                    <input class="post-input" type="textbox" name="skills" placeholder="Type Here">
                </div>
                </div>
            </div>

        </div>
        <div class="card card-block m-0 contact-cust-card">

            <h3 class="post-h3 contact-m-bottom">Rate and Availability</h3>
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">How would you like to pay?</label>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-9">
                <div class="post-m-b-50">
                    <select class="post-select" name="pay" id="pay">
                      <option>Pay by the hour</option>
                      <option>Pay a fixed price</option>
                    </select>
                </div>
                </div>
            </div> -->
            
            <div id="budget">
              <div class="row">
                  <div class="col-md-12">
                    <label class="post-label offer-b-10">Budget<span class="glyphicon glyphicon-usd dollar" aria-hidden="true" style="font-size:15px !important;height: 15px!important;line-height: 14px !important; color: #494949;"></label>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                  <div class="post-m-b-50">
                    <input type="hidden" name="pay" value="Pay a fixed price">
                      <input type="text" name="budget" class="post-input Numeric" placeholder="Budget Amount (1~999999999)" oninput="maxLengthCheck(this)" name="budget" id="post-budget" minlength="1" maxlength="9">
                  </div>
                  </div>
              </div>  
            </div>
            <span class="hider post-error error-color" id="post-budget-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            
            <div class="row post-b-m-40">
              <div class="col-md-12">
                <label class="post-label offer-b-10">Desired Experience Level</label>
              </div>
              <div class="row m-0">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                      <label><div class="text-center feed-border post-box-pad post-border-hover" id="entry"><input type="radio" name="experiencelevel" hidden="hidden" checked="checked" value="Entry Level">
                        <span><i class="fa fa-usd post-icon-size" aria-hidden="true"></i></span>
                        <hr class="post-cust-hr">
                        <p class="post-check-text post-check-corr">Entry Level</p>
                      </div></label>
                    </div>
                    <div class="col-md-3">
                      <label><div class="text-center feed-border post-box-pad post-border-hover" id="intermediate"><input type="radio" name="experiencelevel" hidden="hidden" value="Intermediate Level">
                        <span><i class="fa fa-usd post-icon-size" aria-hidden="true"></i></span>
                        <span><i class="fa fa-usd post-icon-size" aria-hidden="true"></i></span>
                        <hr class="post-cust-hr">
                        <p class="post-check-text post-check-corr-inter">Intermediate</p>
                      </div></label>
                    </div>
                    <div class="col-md-3">
                     <label> <div class="text-center feed-border post-box-pad post-border-hover" id="expert">
                     <input type="radio" name="experiencelevel" hidden="hidden" value="Expert Level">
                        <span><i class="fa fa-usd post-icon-size" aria-hidden="true"></i></span>
                        <span><i class="fa fa-usd post-icon-size" aria-hidden="true"></i></span>
                        <span><i class="fa fa-usd post-icon-size" aria-hidden="true"></i></span>
                        <hr class="post-cust-hr">
                        <p class="post-check-text post-check-corr-exper">Expert</p>
                      </div></label>
                    </div>
                  </div>
                </div>

              </div>

            </div>
            <div class="row post-b-m-40">
              <div class="col-md-12">
                <label class="post-label offer-b-10">How long do you expect this job to last?</label>
              </div>
              <div class="col-md-12 offer-row-top">
                <div class="row">
                  <div class="col-md-12">
                    <label class="post-check-text">
                      <input type="radio" name="visibleduration" value="More than 6 months" id="job_lasting" checked="checked">
                      More than 6 months
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio" value="3 to 6 months" name="visibleduration" id="job_lasting">
                      3 to 6 months
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio" value="1 to 3 months" name="visibleduration" id="job_lasting">
                      1 to 3 months
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio" value="Less than 1 month" name="visibleduration" id="job_lasting">
                      Less than 1 month
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio" value="Less than 1 week" name="visibleduration" id="job_lasting">
                      Less than 1 week
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <span class="hider post-error error-color" id="job-lasting-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            <div class="row post-b-m-40">
              <div class="col-md-12">
                <label class="post-label offer-b-10">What time commitment is required for this job?</label>
              </div>
              <div class="col-md-12 offer-row-top">
                <div class="row">
                  <div class="col-md-12">
                    <label class="post-check-text">
                      <input type="radio" name="timecommitment" value="More than 30 hrs/week" id="commit-req" checked="checked">
                      More than 30 hrs/week
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio"  value="Less than 30 hrs/week" name="timecommitment" id="commit-req">
                      Less than 30 hrs/week
                    </label>
                  </div>
                  <div class="col-md-12 offer-row-top">
                    <label class="post-check-text">
                      <input type="radio"  value="I dont know yet" name="timecommitment" id="commit-req">
                      I don't know yet
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <span class="hider post-error error-color" id="commit-req-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">What do you need help with?</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                <div class="post-b-m-40">
                    <textarea rows="8" class="post-text-area" name="help" placeholder="Describe the project and how it fits into your overall business goals/needs" id="project-disc"></textarea>
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="project-desc-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">What will be the freelance be doing?</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                <div class="post-b-m-40">
                    <textarea rows="16" class="post-text-area" name="freelancerdoing" placeholder="Tasks, delevarables, deadlines" id="task-desc"></textarea>
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="task-desc-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
            <div class="row">
                <div class="col-md-12">
                  <label class="post-label offer-b-10">What qualities are needed to be successfull?</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                <div class="post-b-m-40">
                    <textarea rows="8" class="post-text-area" name="qualities" placeholder="Technical skills, experience, personal traits" id="skill-desc"></textarea>
                </div>
                </div>
            </div>
            <span class="hider post-error error-color" id="skill-desc-error"><i class="fa fa-exclamation-circle error-icon" aria-hidden="true"></i>This field is required.</span>
<!--             <div class="post-b-m-40">
                <div class="row">
                <div class="col-md-12 ">
                  <label class="post-label offer-b-10">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    <span class="post-attach">Attach file</span>
                  </label>
                  <div>The file can be upto 25 Mb in size</div>
                </div>
            </div>
            </div> -->
        </div>
        <div class="card card-block m-0 contact-cust-card">
            <div>
              <h3 class="post-h3 contact-m-bottom">Freelancer Preferences</h3>
              <div>
                <div class="row contact-m-bottom">
                  <div>
                    <span class="glyphicon glyphicon-search post-pre-i" aria-hidden="true"></span>
                    <span>
                      <label class="post-pre-p post-check-pre">Do you want freelancers to find and apply to your job?</label>
                      <?php
                                  
                                  $f=sizeof($obj[0]['preferences']);
                                  $h=$f-1;
                                  for($r=0;$r<=$h;$r++)
                                  {
                            ?>
                      <div class="post-pre-s offer-row-top">
                        <label class="post-check-text">
                        
                                      
                                      <input type='radio' style="margin-right: 5px;" name='visibility' value="{{$obj[0]['preferences'][$r]}}">{{$obj[0]['preferences'][$r]}}     
                                  
                                  
                          <!-- <input type="radio" name="apply_job" value="Freelancers using rbs.com and public search engines can find this job." checked="checked">
                          Freelancers using rbs.com and public search engines can find this job. -->
                        </label>

                      </div>
                      <?php
                        }
                      ?>
                      <!-- <div class="post-pre-s offer-row-top">
                        <label class="post-check-text">
                          <input type="radio" value="Only rbs users can find this job." name="apply_job">
                          Only rbs users can find this job.
                        </label>

                      </div>
                      <div class="post-pre-s offer-row-top">
                        <label class="post-check-text">
                          <input type="radio" value="Only freelancers I have invited can find this job." name="apply_job">
                          Only freelancers I have invited can find this job.
                        </label>

                      </div> -->
                    </span>
                  </div>
                </div>


                <div class="row contact-m-bottom">
                  <div>
                    <i class="fa fa-bullseye post-pre-i" aria-hidden="true"></i>
                    <span>
                      <label class="post-pre-p post-check-pre">Preferred Qualifications</label>
                      <div class="post-pre-s">
                        <label class="post-check-text post-pad-r">
                          Specify the qualifications you're looking for in a successful application. Freelancers may still apply if they do not meet your preferences, but they will be clearly notified that they are at a disadvantage.
                        </label>

                      </div>
                      <div class="post-pre-s offer-row-top">

                      <input type="button" id="qualifications" name="qualifications" class="cust-btn-question btn text-capitalize m-0 retpass" value="Add Qualifications" data-toggle="collapse" href="#qualification_hide" aria-expanded="false" aria-controls="collapseExample">
                      <div id="qualification_hide" class="collapse feed-float">
                        <div class="row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">Freelancer Type</label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="freelancertype">
                          <?php
                                  
                                  $l=sizeof($obj[0]['freelancertype']);
                                  $b=$l-1;
                                  for($a=0;$a<=$b;$a++)
                                  {
                            
                                      $value=$obj[0]['freelancertype'][$a];
                                      echo "<option>$value</option>";     
                                  }
                          ?>

                            <!-- <option>No preference</option>
                            <option>Independent - work with your freelancer directly</option>
                            <option>Agency - work thorugh an agency that manages freelancers...</option> -->
                          </select>
                        </div>
                        </div>
                        <div class="row post-collapse-row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">Job Success Score
                          <span><i class="fa fa-question-circle-o" aria-hidden="true"data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="A freelancer’s Job Success score reflects their reputation on rbs based on direct client feedback and other indicators of client satisfaction. A score of 80-89% is solid, while a score of 90% or above is excellent. Learn more."></i></span></label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="jobsuccessscore">
                          <?php
                                  
                                  $q=sizeof($obj[0]['jobsuccessscore']);
                                  $c=$q-1;
                                  for($z=0;$z<=$c;$z++)
                                  {
                            
                                      $value=$obj[0]['jobsuccessscore'][$z];
                                      echo "<option>$value</option>";     
                                  }
                          ?>
                            <!-- <option>Any Job Success</option>
                            <option>90% Job Success & up</option>
                            <option>80% Job Success & up</option> -->
                          </select>
                        </div>
                        </div>
                        <div class="row post-collapse-row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">Rising Talent
                          <span><i class="fa fa-question-circle-o" aria-hidden="true"data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Rising Talent freelancers have great potential based on strong backgrounds in their fields and early success with their clients on rbs."></i></span></label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="risingtalent">
                          <?php
                                  
                                  $s=sizeof($obj[0]['risingtalent']);
                                  $n=$s-1;
                                  for($y=0;$y<=$n;$y++)
                                  {
                            
                                      $value=$obj[0]['risingtalent'][$y];
                                      echo "<option>$value</option>";     
                                  }
                          ?>
                            <!-- <option>Include Rising Talent</option>
                            <option>Don't include Rising Talent</option> -->
                          </select>
                        </div>
                        </div>
                        <div class="row post-collapse-row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">Hours Billed on rbs</label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="hoursbilledonrbs">
                          <?php
                                  
                                  $d=sizeof($obj[0]['hoursbilledonrbs']);
                                  $t=$d-1;
                                  for($p=0;$p<=$t;$p++)
                                  {
                            
                                      $value=$obj[0]['hoursbilledonrbs'][$p];
                                      echo "<option>$value</option>";     
                                  }
                          ?>
                            <!-- <option>Any amount</option>
                            <option>At least 1 hour</option>
                            <option>At least 100 hours</option>
                            <option>At least 500 hours</option>
                            <option>At least 1,000 hours</option> -->
                          </select>
                        </div>
                        </div>
                        <div class="row post-collapse-row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">Location</label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="location">
                          <?php
                                  
                                  $w=sizeof($obj[0]['location']);
                                  $e=$w-1;
                                  for($x=0;$x<=$e;$x++)
                                  {
                          
                                      $value=$obj[0]['location'][$x];
                                      echo "<option>$value</option>";     
                                  }
                          ?>
                            <!-- <option>Any location</option>
                            <option>Africa</option>
                            <option>Americas</option>
                            <option>Antarctica</option>
                            <option>Asia</option>
                            <option>Europe</option>
                            <option>Oceania</option> -->
                          </select>
                        </div>
                        </div>
                        <div class="row post-collapse-row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">English Level (self-assigned)</label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="englishlevel">
                          <?php
                                  
                                  $pp=sizeof($obj[0]['englishlevel']);
                                  $ee=$pp-1;
                                  for($xx=0;$xx<=$ee;$xx++)
                                  {
                          
                                      $value=$obj[0]['englishlevel'][$xx];
                                      echo "<option>$value</option>";     
                                  }
                          ?>
                            <!-- <option>Any level</option>
                            <option>Basic - Only communicates through written communication</option>
                            <option>Conversational - Able to verbally discuss project details</option>
                            <option>Fluent - Complete language command with perfect grammer</option>
                            <option>Native or Bilingual - Knowledge of idioms and colloquialisms</option> -->
                          </select>
                        </div>
                        </div>
                        <div class="row post-collapse-row">
                            <div class="col-md-4 post-collapse-m">
                          <label class="post-pre-p post-check-pre">Group</label>
                        </div>
                        <div class="col-md-8">
                          <select class="post-select" name="group">
                          <?php
                                  
                                  $ppp=sizeof($obj[0]['group']);
                                  $eee=$ppp-1;
                                  for($xxx=0;$xxx<=$eee;$xxx++)
                                  {
                          
                                      $value=$obj[0]['group'][$xxx];
                                      echo "<option>$value</option>";     
                                  }
                          ?>
                            <!-- <option>No preference</option>
                            <option>Us Military Veterans</option>
                            <option>AWeber Email Marketing</option>
                            <option>Pligg</option>
                            <option>Social Impact Agency</option> -->
                          </select>
                        </div>
                        </div>

                      </div>

                      </div>

                    </span>
                  </div>
                </div>

<!--                 <div class="row contact-m-bottom">
                  <div>
                    <i class="fa fa-comments-o post-pre-i" aria-hidden="true"></i>
                    <span>
                      <label class="post-pre-p post-check-pre">Screening Questions</label>
                      <div class="post-pre-s">
                        <label class="post-check-text post-pad-r">
                          Add a few questions you'd like your candidates to answer when applying to your job.
                        </label>

                      </div>
                      <div class="post-pre-s offer-row-top col-md-8">

                      <textarea rows="3" class="post-text-area display" name="screen_ques" id="ques"></textarea>

                      </div>
                      <div class="col-md-4">
                        <i class="fa fa-times post-close display" aria-hidden="true" id="close-ques"></i>
                      </div>
                        <div class="col-md-9 text-right">
                          <label class="post-check-text post-pad-r cust-char-left">
                          256 characters left
                        </label>
                        </div>
                    </span>
                    <div class="post-pre-s offer-row-top col-md-8">

                      <select class="post-select-ques">
                        <option>Select from suggested or recent</option>
                        <option>Create my own question</option>
                      </select>

                      </div>
                  </div>
                </div>
                <div class="row contact-m-bottom">
                  <div>
                    <i class="fa fa-file-o post-pre-i" aria-hidden="true"></i>
                    <span>
                      <label class="post-pre-p post-check-pre">Cover Letter</label>
                      <div class="post-pre-s">
                        <label class="post-check-text post-pad-r">
                          If you don't add any screening questions, we'll require a cover letter to allow freelancers to introduce themselves.
                        </label>
                      </div>
                    </span>
                  </div>
                </div> -->


              </div>
            </div>
        </div>
        <div class="card card-block m-0 contact-cust-card">
            <div class="row">
              <span class="offer-m-15">
                  <input type="submit" id="post" class="cust-btn-primary btn text-capitalize m-0 retpass post-end" value="Post Job">
              </span>
            </div>


        </div>


        </form>
    </div>
  </div>
</div>


  <script type="text/javascript">
    function maxLengthCheck(object) {
          if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
        }
        $('.Numeric').bind('keydown',function(e){
          if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
                // Allow: Ctrl+V
                (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||  
                // Allow: Ctrl+c
                (event.ctrlKey == true && (event.which == '99' || event.which == '67')) || 
                // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
            })
  </script>

@endsection


@section('footer')
  <script>
     $( document ).ready(function() {
       var request = $.ajax({
         url: "{{URL('/')}}/footer" ,
       type: "GET",       
    });
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
   });
});
  </script>
  <div id="dynamicfooter"></div>
@endsection

