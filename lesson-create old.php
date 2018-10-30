<?php $this->load->view('admin/inc/top');?>
 <form role="form" method="post" action="<?php echo base_url()?>quiz">
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase"> Add Lessons</span>
        </div>
    </div>
    <div class="portlet-body form">

            <div class="form-body">


             <!-- category dropdown -->
             <div class="col-md-4">
                <div class="form-group form-md-line-input">
                    <select name="category_id" class="form-control">
                    	<?php
          						if($category->num_rows() > 0){
          							foreach($category->result() as $cat){
          						?>
                                  	<option value="<?php echo $cat->id?>"><?php echo $cat->category_name?></option>
                                  <?php
          							}
          						}
          						?>
                    </select>
                    <label for="form_control_1">Category</label>
                    <span class="help-block">Some help goes here...</span>
                </div>
             </div>
             <!-- end category dropdown -->
             <div class="form-group">
                  <div class="col-md-9">
                    <label for="form_control_1">Category Title Image</label>
                    <?php
                    $count = 0;
                    ?>
                      <input type="text" class="form-control input-inline input-medium img<?php echo $count?> " name="cat_title_image" required/>
                      <span class="help-inline"><a class="select_img" id="<?php echo $count?>"  data-toggle="modal" href="#static">Upload or select image.</a></span>
                      <!-- <span class="help-block">Some help goes here...</span> -->
                      <?php
                    $count++;
                    ?>
                  </div>
                </div>








            <div style="clear:both"></div>
		        </div>
       </div>
</div>

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">Add Lesson Image</span>

            <div class="col-md-9">
              <label for="form_control_1"></label>
              <?php
              $counts = 1;
              ?>
                <input type="text" class="form-control input-inline input-medium img<?php echo $counts?>" name="img[]" required>
                <input type="text" class="imgId<?php echo $counts?>" name="imgid[]" />

                <span class="help-inline"><a class="select_img" id="<?php echo $count?>"  data-toggle="modal" href="#static">Upload or select image.</a></span>
                <?php
              $counts++;
              ?>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group form-md-line-input">
                <input type="text" class="form-control" id="form_control_1" name="lesson_name" value="<?php //echo $value?>" required>

                <label for="form_control_1">Lesson  Name</label> <br>
                <span class="help-block">Some help goes here...</span>
            </div>
         </div>

    </div>

    <div class="portlet-body form" style="margin-left: 50px">
        <div class="col-xs-12">
            <div class="col-md-12 caption font-red-sunglo" >
              <i class="icon-settings font-red-sunglo"></i>
              <span class="caption-subject bold uppercase">Add Lesson Example</span>
              <!-- <label for="form_control_1">Add Lessons Example</label> -->
              <div class="actions">
                 <?php ?>
              <!-- //remove sa kay makakutaw nga part :D -->
              <div class="btn-group">
                     <a class="btn btn-sm green" href="javascript:;" id="add-more"> Add more example
                         <i class="fa fa-plus"></i>
                     </a>
                 </div>
              <?php ?>
              </div>


                <div  class="form-horizontal" id="field">
                    <div id="field0" class="form-body">
                        <!-- Text input-->
                        <?php
            						$count = 0;
            						for ($char = 'A'; $char <= 'C'; $char++) {

            						?>
                        <div class="form-group">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" id="form_control_1" name="lesson_example_name" value="<?php //echo $value?>">

                                    <label for="form_control_1">Example Name</label> <br>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                             </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-inline input-medium img<?php echo $count?>" name="imgEx[]">

                                <input type="hidden" class="imgId<?php echo $count?>" name="imgidEx[]" />


                                <span class="help-inline"><a class="select_img" id="<?php echo $count?>"  data-toggle="modal" href="#static">Upload or select image.</a></span>

                            </div>

                        </div>
                        <?php
          						$count++;
          							}
          						?>
                    </div>
                </div>
                <div style="clear:both"></div>
                <!-- Button -->

            </div>
        </div>
          <div style="clear:both"></div>
	</div>
</div>



<div class="form-actions noborder">
    <button type="submit" class="btn blue">Submit</button>
    <a href="<?php echo base_url()?>quiz" class="btn default">Cancel</a>
</div>

 </form>

 <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                    <button type="button" data-dismiss="modal" class="btn green">Continue Task</button>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/inc/footer');?>









































<?php $this->load->view('admin/inc/top');?>
 <form role="form" method="post" action="<?php echo base_url()?>lessons/post">
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase"> Add Lessons</span>
        </div>
    </div>
    <div class="portlet-body form">

            <div class="form-body">


             <!-- category dropdown -->
             <div class="col-md-4">
                <div class="form-group form-md-line-input">
                    <select name="cat_id" class="form-control">
                    	<?php
          						if($category->num_rows() > 0){
          							foreach($category->result() as $cat){
          						?>
                                  	<option value="<?php echo $cat->id?>"><?php echo $cat->category_name?></option>
                                  <?php
          							}
          						}
          						?>
                    </select>
                    <label for="form_control_1">Category</label>
                    <span class="help-block">Some help goes here...</span>
                </div>
             </div>
             <!-- end category dropdown -->
             <div class="form-group">
                  <div class="col-md-9">
                    <label for="form_control_1">Category Title Image</label>

                      <input type="text" class="form-control input-inline input-medium img100 " name="cat_title_image" required/>
                      <span class="help-inline"><a class="select_img" id="100"  data-toggle="modal" href="#static">Upload or select image.</a></span>
                      <!-- <span class="help-block">Some help goes here...</span> -->

                  </div>
                </div>




                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" id="form_control_1" name="template_num" value="<?php //echo $value?>" required>
                        <label for="form_control_1">TEMPLATE #</label>
                        <span class="help-block">Some help goes here...</span>
                    </div>
                 </div>


            <div style="clear:both"></div>
		        </div>
       </div>
</div>

<div class="portlet light bordered">


    <div class="portlet-title">
        <div class="caption font-red-sunglo">

            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">Add Lesson Image</span>
          </div>

            <div class="col-md-9">
              <label for="form_control_1"></label>
              <?php
              $count = 0;
              ?>
                <input type="text" class="form-control input-inline input-medium img<?php echo $count?>" name="img[]" required>
                <input type="text" class="imgId<?php echo $count?>" name="imgid[]" />

                <span class="help-inline"><a class="select_img" id="<?php echo $count?>"  data-toggle="modal" href="#static">Upload or select image.</a></span>
                <?php
              $count++;
              ?>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group form-md-line-input">
                <input type="text" class="form-control" id="form_control_1" name="lesson_name" value="<?php //echo $value?>" required>

                <label for="form_control_1">Lesson  Name</label> <br>
                <span class="help-block">Some help goes here...</span>
            </div>
         </div>






         <!-- START LESSON EXAMPLE -->

         <div class="portlet-body form" style="margin-left: 50px">
             <div class="col-xs-12">
                 <div class="col-md-12 caption font-red-sunglo" >
                   <i class="icon-settings font-red-sunglo"></i>
                   <span class="caption-subject bold uppercase">Add Lesson Example</span>
                   <!-- <label for="form_control_1">Add Lessons Example</label> -->
                   <div class="actions">
                      <?php ?>
                   <!-- //remove sa kay makakutaw nga part :D -->
                   <div class="btn-group">
                          <a class="btn btn-sm green" href="javascript:;" id="add-more"> Add more example
                              <i class="fa fa-plus"></i>
                          </a>
                      </div>
                   <?php ?>
                   </div>


                     <div  class="form-horizontal" id="field">
                         <div id="field0" class="form-body">
                             <!-- Text input-->
                             <?php
                             $count = 1;
                             for ($char = 'A'; $char <= 'D'; $char++) {

                             ?>
                             <div class="form-group">

                                 <div class="col-md-4">
                                     <div class="form-group form-md-line-input">
                                         <input type="text" class="form-control " id="form_control_1" name="lessonidEx[]" value="<?php //echo $value?>">
                                         <input type="hidden" name="lessonidEx[]" />

                                         <label for="form_control_1">Example Name</label> <br>
                                         <span class="help-block">Some help goes here...</span>
                                     </div>
                                  </div>
                                 <div class="col-md-4">
                                     <input type="text" class="form-control input-inline input-medium imgEx<?php echo $count?>" name="imgEx[]">

                                     <input type="hidden" class="imgIdEx<?php echo $count?>" name="imgidEx[]" />


                                     <span class="help-inline"><a class="select_img" id="<?php echo $count?>"  data-toggle="modal" href="#static">Upload or select image.</a></span>

                                 </div>

                             </div>
                             <?php
                           $count++;
                             }
                           ?>
                         </div>
                     </div>
                     <div style="clear:both"></div>
                     <!-- Button -->

                 </div>
             </div>
               <div style="clear:both"></div>
         </div>
         <!-- END LESSON EXAMPLE -->


</div>


<div class="form-actions noborder">
    <button type="submit" class=" success_quiz_add btn blue">Submit</button>
    <a href="<?php echo base_url()?>lesson" class="btn default">Cancel</a>
</div>

 </form>

 <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                    <button type="button" data-dismiss="modal" class="btn green">Continue Task</button>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/inc/footer');?>
