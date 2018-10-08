
  @extends('admin::layouts.master')

  @section('content') 
  @include('admin::partials.navigation')
  @include('admin::partials.breadcrumb')   

  @include('admin::partials.sidebar')  
  <div class="panel panel-white"> 


    <div class="panel panel-flat">
      <div class="panel-heading">
      <h6 class="panel-title"><b>Create {{$page_title ?? ''}}</b><a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
      <div class="heading-elements">
      <ul class="icons-list">
        <li> <a type="button" href="{{route('category')}}" class="btn btn-primary text-white   btn-rounded "> View Products<span class="legitRipple-ripple" ></span></a></li> 
      </ul>
      </div>
      </div> 
    </div>
                                
         <form class="steps-state-saving" action="#">
            <h6>Personal data</h6>
            <fieldset>
               

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Applicant name:</label>
                    <input type="text" name="name" class="form-control" placeholder="John Doe">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" name="email" class="form-control" placeholder="your@email.com">
                  </div>
                </div>
              </div> 
  
            </fieldset>

            <h6>Your education</h6>
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>University:</label>
                                    <input type="text" name="university" placeholder="University name" class="form-control">
                                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Country:</label>
                                      <select name="university-country" data-placeholder="Choose a Country..." class="select">
                                          <option></option> 
                                          <option value="1">United States</option> 
                                          <option value="2">France</option> 
                                          <option value="3">Germany</option> 
                                          <option value="4">Spain</option> 
                                      </select>
                                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Degree level:</label>
                                    <input type="text" name="degree-level" placeholder="Bachelor, Master etc." class="form-control">
                                  </div>

                  <div class="form-group">
                    <label>Specialization:</label>
                                    <input type="text" name="specialization" placeholder="Design, Development etc." class="form-control">
                                  </div>
                </div>

                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>From:</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-from-month" data-placeholder="Month" class="select">
                                                <option></option>
                                                  <option value="January">January</option> 
                                                  <option value="...">...</option> 
                                                  <option value="December">December</option> 
                                              </select>
                                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-from-year" data-placeholder="Year" class="select">
                                                  <option></option> 
                                                  <option value="1995">1995</option> 
                                                  <option value="...">...</option> 
                                                  <option value="1980">1980</option> 
                                              </select>
                                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label>To:</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-to-month" data-placeholder="Month" class="select">
                                                <option></option>
                                                  <option value="January">January</option> 
                                                  <option value="...">...</option> 
                                                  <option value="December">December</option> 
                                              </select>
                                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-to-year" data-placeholder="Year" class="select">
                                                  <option></option> 
                                                  <option value="1995">1995</option> 
                                                  <option value="...">...</option> 
                                                  <option value="1980">1980</option> 
                                              </select>
                                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Language of education:</label>
                                    <input type="text" name="education-language" placeholder="English, German etc." class="form-control">
                                  </div>
                </div>
              </div>
            </fieldset>

            <h6>Your experience</h6>
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company:</label>
                                    <input type="text" name="experience-company" placeholder="Company name" class="form-control">
                                  </div>

                  <div class="form-group">
                    <label>Position:</label>
                                    <input type="text" name="experience-position" placeholder="Company name" class="form-control">
                                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label>From:</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-from-month" data-placeholder="Month" class="select">
                                                <option></option>
                                                  <option value="January">January</option> 
                                                  <option value="...">...</option> 
                                                  <option value="December">December</option> 
                                              </select>
                                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-from-year" data-placeholder="Year" class="select">
                                                  <option></option> 
                                                  <option value="1995">1995</option> 
                                                  <option value="...">...</option> 
                                                  <option value="1980">1980</option> 
                                              </select>
                                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label>To:</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-to-month" data-placeholder="Month" class="select">
                                                <option></option>
                                                  <option value="January">January</option> 
                                                  <option value="...">...</option> 
                                                  <option value="December">December</option> 
                                              </select>
                                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                                              <select name="education-to-year" data-placeholder="Year" class="select">
                                                  <option></option> 
                                                  <option value="1995">1995</option> 
                                                  <option value="...">...</option> 
                                                  <option value="1980">1980</option> 
                                              </select>
                                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                                  <div class="form-group">
                    <label>Brief description:</label>
                                      <textarea name="experience-description" rows="4" cols="4" placeholder="Tasks and responsibilities" class="form-control"></textarea>
                                  </div>

                  <div class="form-group">
                    <label class="display-block">Recommendations:</label>
                                      <input name="recommendations" type="file" class="file-styled">
                                      <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                  </div>
                </div>
              </div>
            </fieldset>

            <h6>Additional info</h6>
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="display-block">Applicant resume:</label>
                                      <input type="file" name="resume" class="file-styled">
                                      <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Where did you find us?</label>
                                      <select name="source" data-placeholder="Choose an option..." class="select-simple">
                                          <option></option> 
                                          <option value="monster">Monster.com</option> 
                                          <option value="linkedin">LinkedIn</option> 
                                          <option value="google">Google</option> 
                                          <option value="adwords">Google AdWords</option> 
                                          <option value="other">Other source</option>
                                      </select>
                                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Availability:</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="availability" class="styled">
                        Immediately
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="availability" class="styled">
                        1 - 2 weeks
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="availability" class="styled">
                        3 - 4 weeks
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="availability" class="styled">
                        More than 1 month
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Additional information:</label>
                                      <textarea name="additional-info" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control"></textarea>
                                    </div>
                </div>
              </div>
            </fieldset>
          </form>
</div> 
        
@stop